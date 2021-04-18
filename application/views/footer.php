<!--  <a class="btn btn-warning" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="margin-top: 50px; margin-left: 100px">
    Cross Site Request Forgery (CSRF)
  </a> -->
<div class="collapse" id="collapseExample" >

<div class="container" style="display: none;">
Cross Site Request Forgery (CSRF) is one of the most common vulnerabilities in websites and web applications. As announced, CodeIgniter 2.0 will feature a built-in CSRF protection, which I’d like to analyze for you.<!--more-->
<p class="warning">Hint: This is the transcript of a post from my old blog, which I've replaced. I've taken it over since it still seems to receive some attention.</p>
In this year’s <a href="http://www.owasp.org/index.php/Category:OWASP_Top_Ten_Project" target="_blank">Top 10 of the Most Critical Security Risks in Web Applications</a>, which is issued by the <a href="http://www.owasp.org/index.php/Main_Page" target="_blank">OWASP</a>, CSRF ranks fifth, a rank which it has had for more than four years now. For a reason – its rather high complexity, multitude of attack vectors and massive damage potential make it one of the most dangerous attacks on websites. Developers often tend to underestimate the problem or don’t know how to implement an effective protection.

In this blog post, I’m going to analyze such a protection and show you how CodeIgniter 2.0 tackles the issue. However before I go into detail, I’m going to give you a quick refresher about CSRF and how it works. This might be useful to those of you who don’t deal with web security on a daily basis. If you know CSRF by heart already, you might as well <a href="#skip">skip this section</a>.
<h2>CSRF explained</h2>
What is CSRF and how does it work? CSRF, also known as XSRF, is short for Cross Site Request Forgery. OWASP’s definition for CSRF is this:
<blockquote>A CSRF attack forces a logged-on victim’s browser to send a forged HTTP request, including the victim’s session cookie and any other automatically included authentication information, to a vulnerable web application. This allows the attacker to force the victim’s browser to generate requests the vulnerable application thinks are legitimate requests from the victim.”</blockquote>
So, what we need to perform a CSRF attack is this:
<ul>
<li>A vulnerable website or application</li>
<li>A victim which is logged in at this website</li>
</ul>
Let’s assume the vulnerable website <code>www.example.com</code> allows users to buy goods from their web shop. For the sake of simplicity, I’m using GET parameters to demonstrate the problem, however POST is affected likewise. The URL which a logged-in user has to visit to buy a product is the following:
<pre class="prettyprint"><code class="language-html">http://www.example.com/buy.php?productID=x&amp;amount=y</code></pre>
By calling this URL, we submit the parameters <code>productID </code>and <code>amount </code>with the values <code>x</code> and <code>y</code> to the script. The script uses those parameters to process the order. A malicious attacker can now make a victim’s browser send a request to this website. This could be done by simply putting an image tag on a website that he controls:
<pre class="prettyprint"><code class="language-html"><img src="http://www.example.com/buy.php?productID=20&amp;amount=1000" alt="" /></code></pre>
The victim’s browser doesn’t know that the referenced URL is not an image at all; it just sends a HTTP request to the given URL to retrieve whatever data there is. And here’s the trick: Because the victim is logged in at <code>example.com</code>, the browser sends all of the victim’s session and authorization data with the request. The victim has unknowingly sent a request to buy 1000 pieces of the product to <code>example.com</code>, and the website has no idea that the request is illegitimate – the order would be executed.
<h2>Principles of CSRF protection</h2>
So, how do we protect a website against CSRF attacks? The underlying principle is easy. A CSRF attack is based on the fact that the attacked website has no way of knowing if the data it receives actually came from a form on this website. What we need is a way to connect the two necessary HTTP requests – form request and form submission – so that we get this piece of information. We can then make sure that data we receive was really entered by a user on our website.

There are several ways to do this. The most common one, which is also used by CodeIgniter, includes a hidden field in each form on the website. This hidden field is called <em>CSRF token</em>. The CSRF token is a random value that changes with each HTTP request sent. As soon as it is inserted in the website forms, it gets saved in the user’s session as well. When the form is submitted, the website checks if the submitted CSRF token equals the one saved in the session. If so, the request is legitimate. The token changes each time a page is requested, which means an attacker would have to guess the current token to successfully perform a CSRF attack.<a name="skip"></a>
<h2>CSRF Protection in CodeIgniter 2.0</h2>
Let me show you how CodeIgniter implements the protection. To enable it, you have to set the correspondig config value to TRUE:
<pre class="prettyprint"><code class="language-php">$config['csrf_protection'] = TRUE;</code></pre>
The Security class generates a unique value for the CSRF token with each HTTP request. When the object is created, the name and value of the token are set.
<pre class="prettyprint"><code class="language-php">// Append application specific cookie prefix to token name
$this->csrf_cookie_name = $this->csrf_token_name;
// Set the CSRF hash
$this->_csrf_set_hash();</code></pre>
The function for it is this:
<pre class="prettyprint"><code class="language-php">function _csrf_set_hash()
{
    if ($this->csrf_hash == '')
    {
        // If the cookie exists we will use it's value.  We don't
        // necessarily want to regenerate it with
        // each page load since a page could contain embedded
        // sub-pages causing this feature to fail
        if ( isset($_COOKIE[$this->csrf_cookie_name] ) AND
          $_COOKIE[$this->csrf_cookie_name] != '' )
        {
            $this->csrf_hash = $_COOKIE[$this->csrf_cookie_name];
        } else {
            $this->csrf_hash = md5(uniqid(rand(), TRUE));
        }
    }
    return $this->csrf_hash;
}</code></pre>
The function first checks the cookie’s existence. If it does exist, its current value is used. The reason is also in the code: If the security class is instantiated multiple times, each request would overwrite the previous one. This would cause only the last generated form to work. Such a case can occur when multiple sub-pages are used in one page, or when loading a form via AJAX.

The function creates a globally available hash value and saves it for further processing – the token’s value is generated. Now it has to be inserted in every form on the website. To do this, the function <code>form_open()</code>, which is part of the form helper, is used:
<pre class="prettyprint"><code class="language-php">function form_open($action = '', $attributes = '', $hidden = array())
{
    [...]
    // CSRF
    if ($CI->config->item('csrf_protection') === TRUE)
    {
        $hidden[$CI->security->csrf_token_name] =
          $CI->security->csrf_hash;
    }
 
    if (is_array($hidden) AND count($hidden) > 0)
    {
        $form .= sprintf("\n%s",form_hidden($hidden));
    }
    return $form;
}</code></pre>
This function now not only creates the opening form tag, but also automatically appends the CSRF token to the form. This means that in order to implement a complete CSRF protection, you always have to use <code class="language-php">form_open()</code> when creating forms. The token is now set and gets submitted with each form. After submission, it has to be checked and compared to the value saved in the session. This is done by the input class during input processing:
<pre class="prettyprint"><code class="language-php">// CSRF Protection check
if ($this->_enable_csrf == TRUE)
{
    $this->security->csrf_verify();
}</code></pre>
The method <code>csrf_verify()</code> of the Security class is called each time a form is sent. This is where the actual check happens:
<pre class="prettyprint"><code class="language-php">function csrf_verify()
{
    // If no POST data exists we will set the CSRF cookie
    if (count($_POST) == 0)
    {
        return $this>csrf_set_cookie();
    }
 
    // Do the tokens exist in both the _POST and _COOKIE arrays?
    if ( ! isset($_POST[$this->csrf_token_name]) OR
         ! isset($_COOKIE[$this->csrf_cookie_name]) )
    {
        $this->csrf_show_error();
    }
 
    // Do the tokens match?
    if ( $_POST[$this->csrf_token_name]
         != $_COOKIE[$this->csrf_cookie_name] )
    {
        $this->csrf_show_error();
    }
 
    // We kill this since we're done and we don't
    // want to polute the _POST array
    unset($_POST[$this->csrf_token_name]);
 
    // Re-generate CSRF Token and Cookie
    unset($_COOKIE[$this->csrf_cookie_name]);
    $this->_csrf_set_hash();
    $this->csrf_set_cookie();
 
    log_message('debug', "CSRF token verified ");
}</code></pre>
The <code class="language-php">csrf_verify()</code> method does two things. If no POST data is received, the CSRF cookie is set. If POST data is received, it checks if the submitted value corresponds with the CSRF token value in the session. If this is the case, the CSRF token's value is deleted and generated again for the next request. The request is recognized as legitimate and the circle can start again.
<h2>Conclusion</h2>
Finally, finally, finally! With this improvement, it’s now really easy to implement a reliable CSRF protection. All you need to do is set the config value to TRUE and CodeIgniter does the rest for you. The fact that you can keep on using the usual methods and don’t have to remember doing anything in addition make this a really smart implementation.

If you’re not using CodeIgniter 2.0 yet and don’t plan on doing so for a while, you might still consider copying the CSRF protection methods from the 2.0 source code and update your 1.7.2 installation with it – this will give you a big gain in security.
<p class="info">If you're interested in CodeIgniter, you might also like this post: <a href="http://blog.beheist.com/integrating-codeigniter-and-doctrine-2-orm-with-composer/">Integrating CodeIgniter and Doctrine 2 ORM with Composer</a>.</p>
<h5>Further Reading</h5>
<ul>
<li><a href="http://shiflett.org/articles/cross-site-request-forgeries" target="_blank">Security Guru Chris Shiflett about CSRF and CSRF protection </a></li>
<li><a href="http://owasptop10.googlecode.com/files/OWASP Top 10 - 2010.pdf" target="_blank">PDF: Top 10 Security Risks in Web Applications (OWASP) </a></li>
</ul>
</div>
</div>

</body>
<footer class="footer bg-dark" style="float: left">
  <div class="container">
    <span class="text-muted">Vroulos Michail &copy; 2019-<?php echo date("Y"); ?></span>
  </div>
  

</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url('assets/jQuery/jQuery-3.5.1.js'); ?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.js'); ?>"></script>

<!-- jBox is a jQuery plugin that makes it easy to create
customizable tooltips, modal windows, image galleries and more-->
<script src="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.0/dist/jBox.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.2.0/dist/jBox.all.min.css" rel="stylesheet">

<script type="text/javascript" src="<?php echo base_url('assets/js/script.js') ?>"></script>

<!--  use a javascript approach, window.history.replaceState to prevent a resubmit on refresh and back button. In other words with this script the form is not submiting again -->
<script type="text/javascript">
	if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

</html>
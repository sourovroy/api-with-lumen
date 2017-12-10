<h1>Users</h1>
<h2>Read all users</h2>
<p>Get a list of all users with pagination.</p>

<blockquote>
	<p>Example request:</p>
</blockquote>

<pre><code class="language-bash">curl -X GET "http://localhost/api/test" \ -H "Accept: application/json"</code></pre>

<pre><code class="language-javascript">var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/test",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function(response){
    console.log(response);
});</code></pre>

<blockquote>
	<p>Example response:</p>
</blockquote>

<pre><code class="language-json">[
	"hello world"
]</code></pre>

<h3>HTTP Request</h3>
<p><code>GET api/test</code></p>
<p><code>HEAD api/test</code></p>
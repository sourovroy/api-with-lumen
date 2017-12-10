<h1>Users</h1>
<h2>Read all users</h2>

<blockquote>
	<p>Example request:</p>
</blockquote>

<pre><code class="language-bash">curl -X GET "http://api.sourov.im/users"</code></pre>

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

<pre><code class="language-json">{
  "items": [
    {
      "id": 1,
      "name": "Dell Becker",
      "email": "ziemann.bennett@funk.com"
    },
    {
      "id": 2,
      "name": "Prof. Marlene Will DVM",
      "email": "clarissa.moen@walker.biz"
    },
    {
      "id": 3,
      "name": "Harley Grimes",
      "email": "nicholas.lebsack@yahoo.com"
    },
    {
      "id": 4,
      "name": "Alaina Hills",
      "email": "vcremin@yahoo.com"
    }
  ],
  "pagination": {
    "current_page": 1,
    "last_page": 1,
    "per_page": 20,
    "total": 4,
    "first_page_url": "http://api.sourov.im/users?page=1",
    "last_page_url": "http://api.sourov.im/users?page=1",
    "next_page_url": null,
    "prev_page_url": null
  },
  "status": 200,
  "success": true
}</code></pre>

<p>Get a list of all users with pagination.</p>
<h3>HTTP Request</h3>
<p><code>GET http://api.sourov.im/users</code></p>

<h3>HTTP Request</h3>
<p><code>GET api/test</code></p>
<p><code>HEAD api/test</code></p>
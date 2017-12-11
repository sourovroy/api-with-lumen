<h1>Users</h1>
<h2>Read users</h2>

<blockquote>
	<p>Example request:</p>
</blockquote>

<pre><code class="language-bash">curl -X GET "https://api.sourov.im/users"</code></pre>

<pre><code class="language-javascript">jQuery.ajax({
  url: "https://api.sourov.im/users",
  method: "GET",
  success: function(response){
    console.log(response);
  },
  error: function(xhr, status, errors){
    console.log(errors);
  }
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
<p><code>GET https://api.sourov.im/users</code></p>

<h3>URL Parameters</h3>
<table>
	<thead>
		<tr>
			<th>Parameter</th>
			<th>Default</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>page</td>
			<td>1</td>
			<td>Number of page in pagination.</td>
		</tr>
		<tr>
			<td>per_page</td>
			<td>20</td>
			<td>How many items will show in a request.</td>
		</tr>
	</tbody>
</table>


<h2>Create user</h2>

<blockquote>
	<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -H "Content-Type: application/json" -X POST -d \
'{"email":"cynthialang@dayrep.com","name":"Cynthia Lang","password":"abcxyz"}' \
"https://api.sourov.im/users"</code></pre>
<pre><code class="language-javascript">jQuery.ajax({
  url: "https://api.sourov.im/users",
  method: "POST",
  data: {
    name: "Cynthia Lang",
    email: "cynthialang@dayrep.com",
    password: "iraeYap7zoh"
  },
  success: function(response){
    console.log(response);
  },
  error: function(xhr, status, errors){
    console.log(errors);
  }
});</code></pre>

<blockquote>
	<p>Example response:</p>
</blockquote>
<pre><code class="language-json">{
  "item": {
    "id": 5,
    "email": "cynthialang@dayrep.com",
    "name": "Cynthia Lang"
  },
  "status": 201,
  "success": true
}</code></pre>

<p>Create a new user. On success of request it will returns a single user object.</p>
<h3>HTTP Request</h3>
<p><code>POST https://api.sourov.im/users</code></p>
<h3>Required properties</h3>
<p>email, password</p>
<h3>Data Parameters</h3>
<table>
	<thead>
	<tr>
		<th>Parameter</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>name</td>
		<td>string</td>
		<td>Name of the new user.</td>
	</tr>
	<tr>
		<td>email</td>
		<td>string</td>
		<td>Email address of new user, must be a valid email address.</td>
	</tr>
	<tr>
		<td>password</td>
		<td>string</td>
		<td>Password of new user, minimum 6 characters length.</td>
	</tr>
	</tbody>
</table>
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
}</code>
</pre>

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
}</code>
</pre>

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

<h2>Read an user</h2>

<blockquote>
  <p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET "https://api.sourov.im/users/4"</code></pre>
<pre><code class="language-javascript">jQuery.ajax({
  url: "https://api.sourov.im/users/4",
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
  "item": {
    "id": 4,
    "name": "Alaina Hills",
    "email": "vcremin@yahoo.com"
  },
  "status": 200,
  "success": true
}</code>
</pre>

<p>Get any user by id, it will returns a single user object.</p>
<h3>HTTP Request</h3>
<p><code>GET https://api.sourov.im/users/:id</code></p>

<h3>User attributes</h3>
<table>
  <thead>
  <tr>
    <th>Attribute</th>
    <th>Type</th>
    <th>Description</th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td>id</td>
    <td>integer</td>
    <td>Unique identifier of user.</td>
  </tr>
  <tr>
    <td>name</td>
    <td>string</td>
    <td>Name of user.</td>
  </tr>
  <tr>
    <td>email</td>
    <td>string</td>
    <td>Email address of user.</td>
  </tr>
  </tbody>
</table>

<h2>Get API token</h2>

<blockquote>
  <p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -H "Api-Password: secret" -X GET \
"https://api.sourov.im/users/4"</code></pre>
<pre><code class="language-javascript">jQuery.ajax({
  url: "https://api.sourov.im/users/4",
  method: "GET",
  headers: {
    "Api-Password": "secret"
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
    "id": 4,
    "name": "Alaina Hills",
    "email": "vcremin@yahoo.com",
    "token" : "94f73a7957ff4ac0214ce40d26f6ef6e"
  },
  "status":200,
  "success":true
}</code>
</pre>

<p>Get an user by id with api token. You have to send your password as header <code>Api-Password</code> and this request will returns a single user object with api token.</p>

<h3>HTTP Request</h3>
<p><code>GET https://api.sourov.im/users/:id</code></p>

<h3>User attributes</h3>
<table>
  <thead>
  <tr>
    <th>Attribute</th>
    <th>Type</th>
    <th>Description</th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td>id</td>
    <td>integer</td>
    <td>Unique identifier of user.</td>
  </tr>
  <tr>
    <td>name</td>
    <td>string</td>
    <td>Name of user.</td>
  </tr>
  <tr>
    <td>email</td>
    <td>string</td>
    <td>Email address of user.</td>
  </tr>
  <tr>
    <td>token</td>
    <td>string</td>
    <td>Api token of user, it will be necessary to CRUD own data.</td>
  </tr>
  </tbody>
</table>


<h2>Update user</h2>

<blockquote>
  <p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -H "Content-Type: application/json" \
-H "Api-Token: 94f73a7957ff4ac0214ce40d26f6ef6e" -X PUT -d \
'{"email":"vcremin@yahoo.com","name":"Alaina Hills","password":"secret"}' \
"https://api.sourov.im/users/4"</code></pre>
<pre><code class="language-javascript">jQuery.ajax({
  url: "https://api.sourov.im/users/4",
  method: "PUT",
  headers: {
    "Api-Token": "94f73a7957ff4ac0214ce40d26f6ef6e"
  },
  data: {
    name: "Alaina Hills",
    email: "vcremin@yahoo.com",
    password: "secret"
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
    "id": 4,
    "name": "Alaina Hills",
    "email": "vcremin@yahoo.com"
  },
  "status": 200,
  "success": true
}</code>
</pre>

<p>You can update only your own users. In this request you have to send update data and <code>Api-Token</code> header with it. This will returns a single user object with updated data.</p>
<h3>HTTP Request</h3>
<p><code>PUT https://api.sourov.im/users/:id</code></p>

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
    <td>Name of user.</td>
  </tr>
  <tr>
    <td>email</td>
    <td>string</td>
    <td>Email address of user, must be a valid email address.</td>
  </tr>
  <tr>
    <td>password</td>
    <td>string</td>
    <td>Password of user, minimum 6 characters length.</td>
  </tr>
  </tbody>
</table>


<h2>Delete user</h2>

<blockquote>
  <p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -H "Api-Token: 2a686919c1dae796fc36d1173e402058" \
-X DELETE "https://api.sourov.im/users/5"</code></pre>
<pre><code class="language-javascript">jQuery.ajax({
  url: "https://api.sourov.im/users/5",
  method: "DELETE",
  headers: {
    "Api-Token": "2a686919c1dae796fc36d1173e402058"
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
  "data": "The user with id 5 has been deleted.",
  "status": 200,
  "success": true
}</code>
</pre>

<p>Delete an user, On success it will return an object with success message.</p>
<h3>HTTP Request</h3>
<p><code>DELETE https://api.sourov.im/users/:id</code></p>

<h3>Success object attributes</h3>
<table>
  <thead>
  <tr>
    <th>Attribute</th>
    <th>Type</th>
    <th>Description</th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td>data</td>
    <td>string</td>
    <td>Success message with id.</td>
  </tr>
  <tr>
    <td>status</td>
    <td>number</td>
    <td>HTTP status code.</td>
  </tr>
  <tr>
    <td>success</td>
    <td>boolean</td>
    <td>If request completed successfully then it will return true otherwise false.</td>
  </tr>
  </tbody>
</table>

<aside class="notice">
If you have already deleted an user or the Api-Token is not valid then response will be <code>Unauthorized</code> with status <code>401</code>.
</aside>
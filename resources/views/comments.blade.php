<h1>Comments</h1>

<h2>Read all comments</h2>

<blockquote>
	<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET "https://api.sourov.im/comments"</code></pre>
<pre><code class="language-javascript">jQuery.ajax({
  url: "https://api.sourov.im/comments",
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
  "items":[
    {
      "id":4,
      "content":"Et saepe et praesentium cupiditate consectetur perferendis. Natus incidunt beatae saepe occaecati voluptas temporibus.",
      "user_id":"1",
      "post_id":"28"
    },
    {
      "id":5,
      "content":"Exercitationem officia quibusdam dolor laudantium nemo voluptate harum.",
      "user_id":"2",
      "post_id":"38"
    },
    {
      "id":6,
      "content":"Nobis iure asperiores molestias. Fugiat dolorum et in doloremque sed est quia eos.",
      "user_id":"2",
      "post_id":"42"
    }
  ],
  "pagination":{
    "current_page":2,
    "last_page":34,
    "per_page":3,
    "total":100,
    "first_page_url":"https://api.sourov.im/comments?page=1",
    "last_page_url":"https://api.sourov.im/comments?page=34",
    "next_page_url":"https://api.sourov.im/comments?page=3",
    "prev_page_url":"https://api.sourov.im/comments?page=1"
  },
  "status":200,
  "success":true
}</code>
</pre>

<p>Get a list of comments with pagination.</p>
<h3>HTTP Request</h3>
<p><code>GET https://api.sourov.im/comments</code></p>

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

<h2>Read a comment</h2>

<blockquote>
  <p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET "https://api.sourov.im/comments/4"</code></pre>
<pre><code class="language-javascript">jQuery.ajax({
  url: "https://api.sourov.im/comments/4",
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
  "item":{
    "id":4,
    "content":"Et saepe et praesentium cupiditate consectetur perferendis. Natus incidunt beatae saepe occaecati voluptas temporibus.",
    "user_id":"1",
    "post_id":"28"
  },
  "status":200,
  "success":true
}</code>
</pre>

<p>Get any comment by his id, it will returns a single comment object.</p>
<h3>HTTP Request</h3>
<p><code>GET https://api.sourov.im/comments/:id</code></p>

<h3>Comment attributes</h3>
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
    <td>Unique identifier of comment.</td>
  </tr>
  <tr>
    <td>content</td>
    <td>string</td>
    <td>Content of comment.</td>
  </tr>
  <tr>
    <td>user_id</td>
    <td>string</td>
    <td>User id of who created this comment.</td>
  </tr>
  <tr>
    <td>post_id</td>
    <td>string</td>
    <td>Id of the post whose this comment.</td>
  </tr>
  </tbody>
</table>

<h2>Read post comments</h2>

<blockquote>
  <p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET "https://api.sourov.im/posts/50/comments"</code></pre>
<pre><code class="language-javascript">jQuery.ajax({
  url: "https://api.sourov.im/posts/50/comments",
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
  "items":[
    {
      "id":44,
      "content":"Voluptatem iusto architecto molestiae voluptatem dolor aut. Labore qui reiciendis voluptatum repellendus sed repellat voluptatibus.",
      "user_id":"1",
      "post_id":"50"
    },
    {
      "id":65,
      "content":"Quaerat nemo blanditiis et at assumenda facere distinctio. Officia ea non earum et.",
      "user_id":"2",
      "post_id":"50"
    },
    {
      "id":96,
      "content":"Suscipit natus mollitia nihil praesentium.",
      "user_id":"1",
      "post_id":"50"
    },
    {
      "id":100,
      "content":"Omnis qui enim aliquid praesentium placeat distinctio. Veritatis sit nulla quibusdam iusto maxime.",
      "user_id":"1",
      "post_id":"50"
    }
  ],
  "status":200,
  "success":true
}</code>
</pre>

<p>Get all comments of a specific post. No pagination applied here.</p>
<h3>HTTP Request</h3>
<p><code>GET https://api.sourov.im/posts/:post_id/comments</code></p>
<p>Access the <code>items</code> property to get all comments, if no comments found it will return an empty array.</p>

<h2>Create comment</h2>

<blockquote>
  <p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -H "Content-Type: application/json" \
-H "Api-Token: 94f73a7957ff4ac0214ce40d26f6ef6e" -X POST -d \
'{"content":"Nobis placeat dolor sit amet consectetur adipisicing."}' \
"https://api.sourov.im/posts/85/comments"</code></pre>
<pre><code class="language-javascript">jQuery.ajax({
  url: "https://api.sourov.im/posts/85/comments",
  method: "POST",
  headers: {
    "Api-Token": "94f73a7957ff4ac0214ce40d26f6ef6e"
  },
  data: {
    content: "Lorem ipsum dolor sit amet consectetur adipisicing elit Nobis placeat consectetur adipisicing elit Nobis placeat."
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
<pre><code class="language-json"></code>
</pre>

<p>Add comment to a post, you must set <code>Api-Token</code> header to create comment.</p>
<h3>HTTP Request</h3>
<p><code>POST https://api.sourov.im/posts/:post_id/comments</code></p>
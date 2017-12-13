<h1>Posts</h1>

<h2>Read posts</h2>

<blockquote>
	<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET "https://api.sourov.im/posts"</code></pre>
<pre><code class="language-javascript">jQuery.ajax({
  url: "https://api.sourov.im/posts",
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
      "id": 85,
      "title": "Sunt omnis iure qui rem.",
      "content": "Soluta quis natus nihil accusamus et optio. Rem ratione voluptate illo dolorem dolorum unde consequuntur. Veniam hic et ab eius. Dolore quo distinctio aut ut. Aut porro ad doloremque dolorem voluptatem asperiores expedita.",
      "image_url": "http://api.sourov.im/images/5a2be252f15c8.jpeg",
      "user_id": "4",
      "created_at": "2017-12-09 13:17:10"
    },
    {
      "id": 84,
      "title": "Molestiae voluptatem eius quod.",
      "content": "Vero error atque consequatur placeat voluptatum molestias quia facilis. Expedita repellat corporis quis. Magni officia excepturi reprehenderit earum. In et neque totam. Rerum ad laborum est perspiciatis ea. Autem sit debitis blanditiis omnis assumenda laborum.",
      "image_url": "http://api.sourov.im/images/5a2be2513ceb5.jpeg",
      "user_id": "4",
      "created_at": "2017-12-09 13:17:10"
    }
  ],
  "pagination": {
    "current_page": 1,
    "last_page": 40,
    "per_page": 2,
    "total": 80,
    "first_page_url": "https://api.sourov.im/posts?page=1",
    "last_page_url": "https://api.sourov.im/posts?page=40",
    "next_page_url": "https://api.sourov.im/posts?page=2",
    "prev_page_url": null
  },
  "status": 200,
  "success": true
}</code>
</pre>

<p>Get a list of all posts with pagination.</p>
<h3>HTTP Request</h3>
<p><code>GET https://api.sourov.im/posts</code></p>

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
    <tr>
      <td>order_by</td>
      <td>id</td>
      <td>Set the order of post. Possible values are: id, title, created_at. You must use order_by and sort togather.</td>
    </tr>
    <tr>
      <td>sort</td>
      <td>DESC</td>
      <td>Set the order type. Possible values are: desc, asc. You must use order_by and sort togather.</td>
    </tr>
    <tr>
      <td>with</td>
      <td>null</td>
      <td>You have option to get post with it's user and comments. There are two way to do this <br> 1. ?with=user or ?with=comments <br> 2. ?with[user]&amp;with[comments]</td>
    </tr>
    <tr>
      <td>user_id</td>
      <td>null</td>
      <td>Get all post of a specific user.</td>
    </tr>
		<tr>
			<td>search</td>
			<td>null</td>
			<td>Search post by title.</td>
		</tr>
	</tbody>
</table>

<h3>HTTP Request with all Parameters</h3>
<p><code>GET https://api.sourov.im/posts?per_page=4&amp;page=2&amp;with[user]&amp;with[comments]&amp;user_id=2&amp;search=ae&amp;order_by=title&amp;sort=asc</code></p>

<aside class="notice">
If you want user and commetns togather then pass URL Parameters as array key. Ex. <code>?with[user]&amp;with[comments]</code>
</aside>

<h2>Create post</h2>
<blockquote>
  <p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -H "Content-Type: application/json" \
-H "Api-Token: 94f73a7957ff4ac0214ce40d26f6ef6e" -X POST -d \
'{"title":"Lorem ipsum dolor sit amet","content":"Nobis placeat dolor sit amet consectetur adipisicing.","image_url":"https://source.unsplash.com/random/640x480"}' \
"https://api.sourov.im/posts"</code></pre>
<pre><code class="language-javascript">jQuery.ajax({
  url: "https://api.sourov.im/posts",
  method: "POST",
  headers: {
    "Api-Token": "94f73a7957ff4ac0214ce40d26f6ef6e"
  },
  data: {
    title: "Molestiae voluptatem eius quod",
    content: "Lorem ipsum dolor sit amet consectetur adipisicing elit Nobis placeat consectetur adipisicing elit Nobis placeat.",
    image_url: "https://source.unsplash.com/random/640x480"
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
    "id": 86,
    "title": "Cum voluptas inventore enim quod",
    "content": "Cumque aut quo quas optio. Quia alias commodi non sapiente illo omnis",
    "image_url": "https://source.unsplash.com/random/640x480",
    "user_id": 4,
    "created_at": "2017-12-13 17:54:35"
  },
  "status": 201,
  "success": true
}</code>
</pre>

<p>Create a new post. On success of request it will returns a single post object. You must use Api-Token header to create post.</p>
<h3>HTTP Request</h3>
<p><code>POST https://api.sourov.im/posts</code></p>
<h3>Required properties</h3>
<p>title</p>
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
    <td>title</td>
    <td>string</td>
    <td>Title of the new post.</td>
  </tr>
  <tr>
    <td>content</td>
    <td>string</td>
    <td>Content of the new post.</td>
  </tr>
  <tr>
    <td>image_url</td>
    <td>string</td>
    <td>Image URL of the new post.</td>
  </tr>
  </tbody>
</table>

<h2>Read a post</h2>

<blockquote>
  <p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET "https://api.sourov.im/posts/86"</code></pre>
<pre><code class="language-javascript">jQuery.ajax({
  url: "https://api.sourov.im/posts/86",
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
    "id": 86,
    "title": "Cum voluptas inventore enim quod",
    "content": "Cumque aut quo quas optio. Quia alias commodi non sapiente illo omnis",
    "image_url": "https://source.unsplash.com/random/640x480",
    "user_id": 4,
    "created_at": "2017-12-13 17:54:35"
  },
  "status": 200,
  "success": true
}</code>
</pre>

<p>Get any post by id, it will returns a single post object.</p>
<h3>HTTP Request</h3>
<p><code>GET https://api.sourov.im/posts/:id</code></p>

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
    <td>Unique identifier of post.</td>
  </tr>
  <tr>
    <td>title</td>
    <td>string</td>
    <td>Name of user.</td>
  </tr>
  <tr>
    <td>content</td>
    <td>string</td>
    <td>Post body or post content.</td>
  </tr>
  <tr>
    <td>image_url</td>
    <td>string</td>
    <td>Post image url.</td>
  </tr>
  <tr>
    <td>user_id</td>
    <td>string</td>
    <td>User id of who created this post.</td>
  </tr>
  <tr>
    <td>created_at</td>
    <td>string</td>
    <td>Post created date and time.</td>
  </tr>
  </tbody>
</table>

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
      <td>with</td>
      <td>null</td>
      <td>You have option to get post with it's user and comments. There are two way to do this <br> 1. ?with=user or ?with=comments <br> 2. ?with[user]&amp;with[comments]</td>
    </tr>
  </tbody>
</table>

<h2>Update post</h2>

<blockquote>
  <p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -H "Content-Type: application/json" \
-H "Api-Token: 94f73a7957ff4ac0214ce40d26f6ef6e" -X PUT -d \
'{"title":"Lorem ipsum dolor sit amet","content":"Nobis placeat dolor sit amet consectetur adipisicing.","image_url":"https://source.unsplash.com/random/640x480"}' \
"https://api.sourov.im/posts/86"</code></pre>
<pre><code class="language-javascript">jQuery.ajax({
  url: "https://api.sourov.im/posts/86",
  method: "PUT",
  headers: {
    "Api-Token": "94f73a7957ff4ac0214ce40d26f6ef6e"
  },
  data: {
    title: "Molestiae voluptatem eius quod",
    content: "Lorem ipsum dolor sit amet consectetur adipisicing elit Nobis placeat consectetur adipisicing elit Nobis placeat.",
    image_url: "https://source.unsplash.com/random/640x480"
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
    "id": 86,
    "title": "Cum voluptas inventore enim quod",
    "content": "Cumque aut quo quas optio. Quia alias commodi non sapiente illo omnis",
    "image_url": "https://source.unsplash.com/random/640x480",
    "user_id": 4,
    "created_at": "2017-12-13 17:54:35"
  },
  "status": 200,
  "success": true
}</code>
</pre>

<p>You can update your own posts only. In this request you have to send update data and <code>Api-Token</code> header with it. This will returns a single post object with updated data.</p>
<h3>HTTP Request</h3>
<p><code>PUT https://api.sourov.im/posts/:id</code></p>

<h3>Required properties</h3>
<p>title</p>
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
    <td>title</td>
    <td>string</td>
    <td>Title of the post.</td>
  </tr>
  <tr>
    <td>content</td>
    <td>string</td>
    <td>Content of the post.</td>
  </tr>
  <tr>
    <td>image_url</td>
    <td>string</td>
    <td>Image URL of the post.</td>
  </tr>
  </tbody>
</table>

<h2>Delete post</h2>

<blockquote>
  <p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -H "Api-Token: 2a686919c1dae796fc36d1173e402058" \
-X DELETE "https://api.sourov.im/posts/86"</code></pre>
<pre><code class="language-javascript">jQuery.ajax({
  url: "https://api.sourov.im/posts/86",
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
  "data": "The post with id 86 has been deleted.",
  "status": 200,
  "success": true
}</code>
</pre>

<p>Delete a post, On success it will return an object with success message.</p>
<h3>HTTP Request</h3>
<p><code>DELETE https://api.sourov.im/posts/:id</code></p>

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
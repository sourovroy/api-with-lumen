<h1>HTTP Status Codes</h1>
<p>The REST API returns these HTTP status codes.</p>

<table>
	<thead>
		<tr>
			<th>Code</th>
			<th>Text</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>200</td>
			<td>OK</td>
			<td>Everything is OK and the request completed successfully.</td>
		</tr>
		<tr>
			<td>201</td>
			<td>Created</td>
			<td>When you created a resource. This will be return the resource that you have created.</td>
		</tr>
		<tr>
			<td>401</td>
			<td>Unauthorized</td>
			<td>Authentication failed or user doesn't have permissions for requested operation.</td>
		</tr>
		<tr>
			<td>403</td>
			<td>Forbidden</td>
			<td>Access denied.</td>
		</tr>
		<tr>
			<td>404</td>
			<td>Not Found</td>
			<td>This is returned when you try to request something that doesn’t exist.</td>
		</tr>
		<tr>
			<td>405</td>
			<td>Method Not Allowed</td>
			<td>Not all endpoints support all http methods.</td>
		</tr>
		<tr>
			<td>422</td>
			<td>Unprocessable Entity</td>
			<td>This is validation error, you must use valid data to add or edit record.</td>
		</tr>
		<tr>
			<td>500</td>
			<td>Internal Server Error</td>
			<td>When you see this, something went wrong on our end. Either try again, or contact me with sourovfci@gmail.com.</td>
		</tr>
	</tbody>
</table>
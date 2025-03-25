# API Documentation: Delete a Product

## Endpoint: Delete a Product

### URL

`DELETE /products/{id}`

### Description

This endpoint allows you to delete a product listing by its unique identifier. It returns a success message upon successful deletion or an error message if the product is not found.

### Parameters

- **Path Parameter:**
    - `id` (integer, required): The unique identifier of the product to be deleted.

### Responses

- **200 OK**: The product was successfully deleted.
    - **Body:**
      ```json
      {
        "message": "Product deleted successfully"
      }
      ```

- **404 Not Found**: The product with the specified ID does not exist.
    - **Body:**
      ```json
      {
        "message": "Product not found"
      }
      ```

### Example Request

```http
DELETE /products/123 HTTP/1.1
Host: yourapi.example.com
Accept: application/json
```

### Example Response

- **Success (200 OK):**
  ```json
  {
    "message": "Product deleted successfully"
  }
  ```

- **Error (404 Not Found):**
  ```json
  {
    "message": "Product not found"
  }
  ```

### Notes

- Ensure that the `id` provided in the path is a valid integer.
- The response will be in JSON format.
- This endpoint will permanently delete the product from the database.

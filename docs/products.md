# API Documentation: Retrieve Product by ID

## Endpoint: Retrieve Product by ID

### URL

`GET /products/{id}`

### Description

This endpoint retrieves a product by its unique identifier. It returns the product details in a structured JSON format using Laravel's JSON Resource.

### Parameters

- **Path Parameter:**
  - `id` (integer, required): The unique identifier of the product you want to retrieve.

### Responses

- **200 OK**: The request was successful, and the product details are returned.
  - **Body:**
    ```json
    {
      "id": 1,
      "name": "Product Name",
      "description": "Product Description",
      "price": 99.99,
      "stock": 10,
      "category_id": 2,
      "image_url": "http://example.com/image.jpg"
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
GET /products/1 HTTP/1.1
Host: yourapi.example.com
Accept: application/json
```

### Example Response

- **Success (200 OK):**
  ```json
  {
    "id": 1,
    "name": "Product Name",
    "description": "Product Description",
    "price": 99.99,
    "stock": 10,
    "category_id": 2,
    "image_url": "http://example.com/image.jpg"
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
- This endpoint uses Laravel's JSON Resource to format the response, ensuring a consistent structure. 
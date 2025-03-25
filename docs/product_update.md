# Update Product

## PUT /products/{id}

Updates an existing product listing.

### Parameters

- **id** (path, required): The unique identifier of the product to be updated.

### Request Body

The request body must be in JSON format and include the following fields:

- **name** (string, required): The name of the product.
- **price** (number, required): The price of the product.
- **description** (string, required): A description of the product.
- **stock** (number, required): The available stock quantity of the product.

### Example Request

```http
PUT /products/12345
Content-Type: application/json

{
    "name": "Updated Product Name",
    "price": 29.99,
    "description": "Updated description of the product.",
    "stock": 50
}
```

### Responses

- **200 OK**: The product was successfully updated.
    - **Response Body**:
    ```json
    {
        "id": "12345",
        "name": "Updated Product Name",
        "price": 29.99,
        "description": "Updated description of the product.",
        "stock": 50
    }
    ```

- **400 Bad Request**: One or more required fields are missing.
    - **Response Body**:
    ```json
    {
        "message": "All fields are required"
    }
    ```

- **404 Not Found**: The product with the specified ID does not exist.
    - **Response Body**:
    ```json
    {
        "message": "Product not found"
    }
    ```

- **500 Internal Server Error**: An error occurred on the server.
    - **Response Body**:
    ```json
    {
        "message": "Server error",
        "error": "Error message here"
    }
    ```

### Notes

- Ensure that the product ID is valid and exists in the database before making the request.
- All fields in the request body are required for a successful update.

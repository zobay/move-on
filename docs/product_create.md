# API Documentation: Create a New Product

## Endpoint: Create a New Product

### URL

`POST /products`

### Description

This endpoint creates a new product listing in the system. It accepts product details in the request body and returns the created product's details in a structured JSON format.

### Request Body

- **Content-Type**: `application/json`
- **Body Parameters:**
    - `name` (string, required): The name of the product.
    - `description` (string, optional): A brief description of the product.
    - `price` (number, required): The price of the product. Must be a non-negative number.
    - `category_id` (integer, required): The ID of the category to which the product belongs. Must exist in the categories table.

### Responses

- **201 Created**: The product was successfully created.
    - **Body:**
      ```json
      {
        "id": 1,
        "name": "New Product Name",
        "description": "New Product Description",
        "price": 49.99,
        "stock": 20,
        "category_id": 2,
        "image_url": "http://example.com/new-image.jpg"
      }
      ```

- **422 Unprocessable Entity**: The request was well-formed but contained validation errors.
    - **Body:**
      ```json
      {
        "message": "The given data was invalid.",
        "errors": {
          "name": ["The name field is required."],
          "price": ["The price must be a number."],
          "category_id": ["The selected category id is invalid."]
        }
      }
      ```

### Example Request

```http
POST /products HTTP/1.1
Host: yourapi.example.com
Content-Type: application/json
Accept: application/json

{
  "name": "New Product",
  "description": "This is a new product.",
  "price": 49.99,
  "category_id": 2
}
```

### Example Response

- **Success (201 Created):**
  ```json
  {
    "id": 1,
    "name": "New Product",
    "description": "This is a new product.",
    "price": 49.99,
    "stock": 20,
    "category_id": 2,
    "image_url": "http://example.com/new-image.jpg"
  }
  ```

- **Error (422 Unprocessable Entity):**
  ```json
  {
    "message": "The given data was invalid.",
    "errors": {
      "name": ["The name field is required."],
      "price": ["The price must be a number."],
      "category_id": ["The selected category id is invalid."]
    }
  }
  ```

### Notes

- Ensure that all required fields are provided in the request body.
- The response will be in JSON format.
- This endpoint uses Laravel's validation to ensure that the provided data is correct before creating the product.

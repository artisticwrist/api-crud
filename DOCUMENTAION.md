This README provides documentation for the usage of the Person API. The API allows you to perform CRUD (Create, Read, Update, Delete) operations on Person records in a database.
Base URL

The base URL for the API is https://your-api-domain.com. 


Authentication

The API routes are protected by Sanctum middleware, meaning you need to authenticate to access most endpoints. You can use Laravel Sanctum to set up authentication. Refer to Laravel Sanctum documentation for more details.
Endpoints
1. Add a Person

    Request

        Method: POST

        Endpoint: /api/add-person

        Headers:
            Content-Type: application/json

        Body:

        json

    {
      "name": "John Doe"
    }

Response

    Status: 201 Created

    Body:

    json

        "Added successfully!"

2. Edit Person Data

    Request

        Method: PUT

        Endpoint: /api/edit-person

        Headers:
            Content-Type: application/json

        Body:

        json

    {
      "id": 1,
      "name": "Updated Name"
    }

Response

    Status: 200 OK

    Body:

    json

        "Updated successfully!"

3. Delete a Person

    Request

        Method: DELETE

        Endpoint: /api/delete-person

        Headers:
            Content-Type: application/json

        Body:

        json

    {
      "id": 1
    }

Response

    Status: 200 OK

    Body:

    json

        "Deleted successfully!"

4. Get Person Data

    Request
        Method: GET
        Endpoint: /api/get-person

    Response

        Status: 200 OK

        Body (example):

        json

        [
          {
            "id": 1,
            "name": "John Doe",
            "created_at": "2023-09-13T12:00:00Z",
            "updated_at": "2023-09-13T14:30:00Z"
          },
          {
            "id": 2,
            "name": "Jane Smith",
            "created_at": "2023-09-13T12:15:00Z",
            "updated_at": "2023-09-13T14:45:00Z"
          }
        ]

Standard Request Format

    All requests must include the Content-Type: application/json header.
    Request bodies should be valid JSON.

Standard Response Format

    Successful responses will have a status code in the 2xx range.
    Error responses will have a status code in the 4xx or 5xx range and contain an error message or validation errors.

Error Handling

    If a request fails validation, the API will respond with a status code 422 Unprocessable Entity and include an errors object in the response body detailing the validation issues.
    If a request results in an unexpected error, the API will respond with a status code 500 Internal Server Error and include an error object in the response body with an error message.
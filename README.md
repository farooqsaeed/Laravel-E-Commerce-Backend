
# Laravel E-Commerce Backend

This open-source Laravel E-Commerce Backend provides a solid foundation for building a robust e-commerce store backend with essential features. It includes database migrations, models, controllers, and API routes for managing users, products, categories, orders, reviews, and more. Built with Laravel, this backend offers flexibility, scalability, and security for your e-commerce applications.




## Features

- User authentication and authorization.
- CRUD operations for products, categories, and orders.
- User profile management.
- Shopping cart functionality.
- Review and rating system for products.
- API endpoints for easy integration with frontend applications.


## API Documentation

#### Signup

```http
  POST /api/auth/login
```

| Body | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required**. The name of the user |
| `email` | `string` | **Required**. A valid email address |
| `password` | `string` | **Required**. A password with a minimum of 8 characters |
| `address` | `string` | **Optional**. The user's address |
| `city` | `string` | **Optional**. The city where the user resides |
| `state` | `string` | **Optional**. The state where the user resides |
| `country` | `string` | **Optional**.The country where the user resides |
| `postal_code` | `string` | **Optional**. The postal code of the user's address. |

#### POST login

```http
  GET /api/auth/login
```

| Body | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `email`      | `string` | **Required**. The email address of the user |
| `password`      | `string` | **Required**. The user's password |

#### POST logout

```http
  POST /api/auth/logout
```

| Header | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `Authorization`      | `string` | **Required**. Bearer token for authentication. Format: `Bearer {token}` |



# bandtech_task
# repository pattern
The Repository Pattern is a software design pattern commonly used in object-oriented programming to separate the logic that retrieves and stores data from the rest of the application. It provides a way to abstract and encapsulate data access operations, making the code more modular, maintainable, and testable.
# features
- Users(get-all,get by id , create , update , delete)
- Products(get-all,get by id , create , update , delete , products by user type)
# installation
Go to CLI and run below commands:
```
https://github.com/Raghad-lababidi/bandtech_task.git
cd bandtech_task
```
# Endpoints

## Register User:
```
POST /api/register
Body => {
    "name": "",
    "user_name": "",
    "password": "",
    "confirmPassword": ""
}
```
## login User:
```
POST /api/login
Body => {
    "user_name": "",
    "password": ""
}
```
(Pass token from login/register response as bearer-token to all below apis as all are restricted with sanctum middleware)
## Get Users
```
Get /api/user/get-all
```
## Get User by id
```
Get /api/user/get-by-id/id=?
```
## create user
```
Post /api/user/create
Body => {
    "name": "",
    "user_name": "",
    "password": "",
    "confirmPassword": ""
}
```
## update user
```
Post /api/user/update
Body => {
    "name": "",
    "user_name": "",
    "avatar": ""
}
```
## delete user
```
Post /api/user/delete
Body => {
    "id": ""
}
```
## Get Products
```
Get /api/product/get-all
```
## Get Product by id
```
Get /api/product/get-by-id/id=?
```
## create product
```
Post /api/product/create
Body => {
    "name": "",
    "description": "",
    "image": "",
    "price": "",
    "slug": ""
}
```
## update product
```
Post /api/product/update
Body => {
    "name": "",
    "description": "",
    "image": "",
    "price": "",
    "slug":""
}
```
## delete product
```
Post /api/product/delete
Body => {
    "id": ""
}
```
## Get active products by user type
```
Get /api/product/products-by-usertype
```



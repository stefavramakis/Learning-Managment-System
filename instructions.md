# Learning Management System - Project

This is a simple implementation of a LMS(Learning Management System) including Seafarer(User), Course, Enrolment and Completion Model .

## Αctions using API post Requests
    1. Enroll a course to a User
    2. Create a completion for an Enrolment

---

## REQUIRMENTS
    PHP  8
    Composer version 2
---

**AUTHORIZATION**
Bearer Token

---

## APP INSTALATION STEPS
```
    composer install
    cp .env.example .env && php artisan key:generate
```
`Inform db credentials on .env file`

```
    php artisan migrate:fresh
    php artisan db:seed
    npm install && npm run dev
```

`Finaly serve your app`
```
    php artisan serve
```

---

## USING THE APP


**POST** BEARER TOKEN


> http://127.0.0.1:8000/api/create/token

```
{
  "email": "myemail@gmail.com",
  "password": "password",
  "device_name": "Laravel"
}
```

---

**POST** ENROLL COURSE


> http://127.0.0.1:8000/api/enroll_course

```
[
    {
        "use_id": (int) id,
        "course_id": (int) id,
    }
]
```

---

**POST** CREATE COMPLETION


> http://127.0.0.1:8000/api/create_completion

```
[
    {
        "use_id": (int) id,
        "enrolment_id": (int) id,
    }
]
```
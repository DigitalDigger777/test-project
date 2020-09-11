### Local deploy
First step - copy .env.example to .env and change db constants
```bash
cp .env.example .env
vi .env
```
next constants should be equals your db access
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test_project
DB_USERNAME=root
DB_PASSWORD=
```

Second step - run migrations and apply seeds

```bash
php artisan migrate:refresh --seed
```

Last step - run dev server
```bash
php artisan serve
```

Run tests
```bash
php artisan test
```

enjoy on http://127.0.0.1:8000

### curl commands for test api

Get clients list
```bash
curl http://127.0.0.1:8000/api/clients
```

Create new client
```bash
curl -X POST -H "Content-Type: application/json" -d '{"email": "test@test.com", "first_name": "John", "last_name": "Doe", "password": "demo"}' http://127.0.0.1:8000/api/clients
```

Update client
```bash
curl -X PUT -H "Content-Type: application/json" -d '{"first_name": "Jane"}' http://127.0.0.1:8000/api/clients/11
```

Get single client
```bash
curl http://127.0.0.1:8000/api/clients/11
```

Delete client
```bash
curl -X DELETE http://127.0.0.1:8000/api/clients/11
```



Get clients list
```bash
curl http://127.0.0.1:8000/api/projects
```

Create new project for client with client_id=1
```bash
curl -X POST -H "Content-Type: application/json" -d \
'{"client_id": "1", "name": "Test Project", "description": "Some description", "statuses": "0"}' \
http://127.0.0.1:8000/api/projects
```

Update project, for example we update statuses from "0" to "1"
```bash
curl -X PUT -H "Content-Type: application/json" -d '{"statuses": "1"}' http://127.0.0.1:8000/api/projects/11
```

Get single project
```bash
curl http://127.0.0.1:8000/api/projects/11
```

Delete project
```bash
curl -X DELETE http://127.0.0.1:8000/api/projects/11
```




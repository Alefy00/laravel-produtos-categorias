# 📦 Sistema de Gerenciamento de Produtos e Categorias — Laravel 11

Este projeto foi desenvolvido como parte de um **desafio técnico** para avaliar conhecimentos em Laravel 11, organização de código, Blade Templates, autenticação e boas práticas.

O sistema permite:

- **Gerenciar Categorias** (criar, listar, editar, excluir)
- **Gerenciar Produtos** (criar, listar, editar, excluir)
- Relacionar produtos a categorias
- **Autenticação** manual (sem uso de starter kits)
- Alterações de schema solicitadas:  
  - Campo `order` em Categorias
  - Campo `show_in_showcase` em Produtos

---

## 🚀 Funcionalidades

### Autenticação
- Tela de login customizada em Blade
- Proteção de rotas com `middleware('auth')`
- Apenas 1 usuário fixo criado manualmente no banco (via Tinker)
- Logout

### Categorias
- CRUD completo
- Campo **order** para definir prioridade
- Ordenação da listagem por `order` e depois `name`

### Produtos
- CRUD completo
- Relacionamento `belongsTo` com Categorias
- Campo **show_in_showcase** (checkbox) para indicar vitrine
- Exibição “Sim/Não” na listagem

### Boas práticas implementadas
- Uso de layout base `layouts.app` para herança no Blade
- Validações com `validate()` nos Controllers
- Mensagens de sucesso com `session('success')`
- Evita N+1 queries com `with()`
- Código organizado por contexto (Controllers, Models, Views)

---

## 🛠 Tecnologias utilizadas
- **Laravel 11**
- **SQLite** (banco local para facilitar execução)
- **Blade Templates**
- PHP 8.2+
- Composer

---

## 📂 Estrutura de pastas relevante
```
app/
 ├── Http/
 │    ├── Controllers/
 │    │    ├── Auth/LoginController.php
 │    │    ├── CategoriaController.php
 │    │    └── ProdutoController.php
 │    └── Middleware/Authenticate.php
 ├── Models/
 │    ├── Categoria.php
 │    └── Produto.php
resources/
 ├── views/
 │    ├── layouts/app.blade.php
 │    ├── auth/login.blade.php
 │    ├── categorias/
 │    │    ├── index.blade.php
 │    │    ├── create.blade.php
 │    │    └── edit.blade.php
 │    └── produtos/
 │         ├── index.blade.php
 │         ├── create.blade.php
 │         └── edit.blade.php
```

---

## ⚙️ Como rodar o projeto localmente

### 1. Clonar o repositório
```bash
git clone https://github.com/Alefy00/laravel-produtos-categorias.git
cd laravel-produtos-categorias
```

### 2. Instalar dependências
```bash
composer install
```

### 3. Configurar o `.env`
Copie o `.env.example` para `.env`:
```bash
cp .env.example .env
```
Edite o `.env` para usar SQLite:
```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

### 4. Criar o arquivo do banco
No Windows:
```bash
type nul > database\database.sqlite
```

### 5. Gerar a chave da aplicação
```bash
php artisan key:generate
```

### 6. Rodar as migrations
```bash
php artisan migrate
```

### 7. Criar o usuário fixo (via Tinker)
```bash
php artisan tinker
```
```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Admin',
    'email' => 'admin@email.com',
    'password' => Hash::make('12345678'),
]);
```
Digite `exit` para sair do Tinker.

### 8. Subir o servidor local
```bash
php artisan serve
```
Acesse no navegador:
```
http://127.0.0.1:8000/login
```
Credenciais padrão:
- Email: `admin@email.com`
- Senha: `12345678`

---

## 📌 Rotas principais
- `/login` → tela de login
- `/categorias` → CRUD de Categorias (protegido por login)
- `/produtos` → CRUD de Produtos (protegido por login)
- `/logout` → encerra sessão

---

## 📋 Checklist de requisitos do desafio

### Estrutura inicial
- [x] Laravel 11 instalado e configurado com SQLite
- [x] Usuário fixo criado via Tinker

### Autenticação
- [x] Tela de login customizada (Blade)
- [x] Proteção de rotas com `auth`
- [x] Logout

### Categorias
- [x] CRUD completo
- [x] Campo `order` adicionado e usado para ordenação

### Produtos
- [x] CRUD completo
- [x] Relacionamento com Categoria
- [x] Campo `show_in_showcase` adicionado

### Boas práticas
- [x] Uso de layout base
- [x] Validações com mensagens de erro no Blade
- [x] Mensagens de sucesso após ações
- [x] Código organizado e claro

---

## 📝 Nota sobre alteração de schema (etapa adicional)
Conforme solicitado, foi simulada uma alteração no banco:
- Categoria: campo `order` adicionado
- Produto: campo `show_in_showcase` adicionado

Essas mudanças foram implementadas com migrations específicas, atualizações nos models, controllers, validações e views.

---

## 📄 Licença
Este projeto foi desenvolvido para fins de avaliação técnica.

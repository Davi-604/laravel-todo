# To-do com categorias 📋

## Projeto desenvolvido com:

<div style="display:inline_block">
    <img align="center" src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
    <img align="center" src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
    <img align="center" src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="TAILWINDCSS">
</div>

---

## Descrição do Projeto 🚀

Esse projeto Laravel consiste em um página de **to-do list** onde o usuário pode se cadastrar, gerenciar e personalizar as suas própias categorias e criar tarefas associadas a elas.

O projeto segue uma estrutura MVC auxiliada pelo Laravel que segue boas práticas de código como o SOLID, isso permite uma maior organização e escalabilidade do projeto como um todo.

---

## Funcionalidades principais 🧾

-   **Cadastro de usuário**: Garante que cada usuário terá as suas própias categorias e tarefas.
-   **CRUD completo para as tarefas e categorias**: O projeto fornece o toda a estrutura necessária para a organização das tarefas e categorias do usuário.
-   **Gráfico de progresso**: Um gráfico dinâmico que mostra para o usuário todo o progresso do dia diacordo com as suas tarefas

-   **Interface Responsiva**: Desenvolvida com **TailwindCSS**, garantindo uma experiência fluida em qualquer tela.

---

## Como executar o projeto 🖥️

### Pré-requisitos:

-   PHP instalado (versão 8 ou superior)
-   Servidor Web compatível com o PHP como o Apache
-   Composer para as depedências do PHP

-   Gerenciador de pacotes npm ou yarn
-   Banco de dados relacional configurado

### Passo a passo:

1. Clone o repositório:

    ```bash
    git clone https://github.com/Davi-604/laravel-todo.git
    ```

    <br/>

2. Instale as depedências do back-end:

    ```bash
    composer install
    ```

    <br/>

3. Configure o aquivo .env:

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nome_do_banco
    DB_USERNAME=seu_usuario
    DB_PASSWORD=sua_senha
    ```

    <br/>

4. Gere uma chave única para o Laravel:

    ```bash
    php artisan key:generate
    ```

    <br/>

5. Execute as migrações e seeders:

    ```bash
    php artisan migrate --seed
    ```

    <br/>

6. Instale as dependências do frontend:

    ```bash
    npm install
    ```

    <br/>

7. Inicie o servidor local:
    ```bash
    npm run dev
    ```
    <br/>

---

## Links 🌐

<a href="https://www.linkedin.com/posts/davicarvalhodev604_laravel-php-programaaexaeto-activity-7277421391505686528-4PIX?utm_source=share&utm_medium=member_desktop" target='_blank'>
    Postagem no linkedIn
</a>
<br/><br/>
<a href="https://youtu.be/BfkD60c8nZ4?si=0bU26cEGPericOPK" target='_blank'>
    Vídeo no youtube
</a>

---

## Créditos 🙌

Este projeto foi baseado no curso da [B7web](https://b7web.com.br), com adaptações e melhorias realizadas por mim para abrangir mais funcionalidades e testar os meus conhecimentos.

<h2 align="center"> 
	Api Rest - Salão de beleza 💅🏻
</h2>

<p align="center">
 <a href="#-sobre-o-projeto">Sobre</a> •
 <a href="#-insomnia">Insomnia</a> • 
 <a href="#-como-executar-o-projeto">Como executar</a> • 
 <a href="#-tecnologias">Tecnologias</a> •  
 <a href="#-autor">Autor</a> • 
 <a href="#-licença">Licença</a>
</p>

## 💻 Sobre o projeto

Api salão é ideal para gerenciamento do seu salão de beleza contemplando agendamentos, cadastros de clientes e colaboradores.

---

## 🔗 Insomnia

Clique abaixo para baixar os endpoints e importar no insomnia

<a href="./insomnia.json">
  <img src="https://img.shields.io/badge/Baixar%20endpoints-Insomnia-%2304D361">
</a>

<h4 align="center"> 
	📍 Endpoints | Insomnia 📍
</h4>

---

## 📌 Como executar o projeto

### Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:
[Git](https://git-scm.com), [Laragon](https://laragon.org/) com nginx, mysql e php 8. Além disto é bom ter um editor para trabalhar com o código como [VSCode](https://code.visualstudio.com/)


#### 🧭 Baixando o projeto

```bash
# Clone este repositório
$ git clone git@github.com:danilalucas/api-salao.git
```
#### 🧭 Configurando o projeto

```bash
# Acessar diretório
$ cd api-salao
# Instalar pacotes
$ composer install --dev
# Copiar env
$ cp .env.example .env
# No VSCode acessar .env e configurar conexão do banco
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=laravel
  DB_USERNAME=root
  DB_PASSWORD=
# Acesse o insomnia, importe o arquivo disponibilizado
```
---

## 🛠 Tecnologias

As seguintes ferramentas foram usadas na construção do projeto:

-   **[PHP](https://www.php.net/)**
-   **[Laravel](https://laravel.com/)**
-   **[Laragon](https://laragon.org/)**
-   **[MySQL](https://www.mysql.com/)**
-   **[Nginx](https://www.nginx.com/)**

---

## 👩‍💻 Autor

<a href="https://github.com/danilalucas">
 <img src="https://avatars.githubusercontent.com/u/80535640?v=4" width="100px;" alt=""/>
 <br />
 <sub><b>Daníla Lucas</b></sub></a> <a href="https://github.com/danilalucas" title="Profile"></a>
 <br />

[![Linkedin Badge](https://img.shields.io/badge/-Danila%20Lucas-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/dan%C3%ADla-lucas/)](https://www.linkedin.com/in/dan%C3%ADla-lucas/) 
[![Gmail Badge](https://img.shields.io/badge/-danilatemoteolucas@gmail.com-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:danilatemoteolucas@gmail.com)](mailto:danilatemoteolucas@gmail.com)

---

## 📝 Licença

Este projeto esta sobe a licença [MIT](./LICENSE).

Feito com ❤️ por Daníla Lucas 👋🏽 [Entre em contato!](https://www.linkedin.com/in/dan%C3%ADla-lucas/)

---
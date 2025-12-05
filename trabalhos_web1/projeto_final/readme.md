# 📊 Sistema de Avaliação de Qualidade

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-316192?style=for-the-badge&logo=postgresql&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)

Este projeto é um sistema web desenvolvido em **Laravel** para gerenciamento de feedbacks, avaliações de dispositivos por setor e geração de relatórios gráficos. O ambiente de desenvolvimento é totalmente containerizado utilizando **Docker**.

---

## 🚀 Como Rodar o Projeto

Siga os passos abaixo para levantar o ambiente de desenvolvimento. O projeto foi configurado para **auto-setup**, facilitando o início imediato.

### Pré-requisitos
* [Docker](https://www.docker.com/) e Docker Compose instalados na máquina.
* [Git](https://git-scm.com/) (opcional, para clonar o repositório).

### Passo a Passo

1.  **Clone o repositório** (ou baixe os arquivos):
    ```bash
    git clone https://github.com/lffbarnii/aula.git
    cd trabalhos_web1/projeto_final/avaliacao_anonima/
    ```

2.  **Inicie os containers**:
    Na raiz do projeto, execute o comando:
    ```bash
    docker compose up
    ```
    *(Adicione a flag `-d` se quiser rodar em segundo plano: `docker compose up -d`)*

3.  **Aguarde a configuração automática**:
    O container irá instalar as dependências do Composer, gerar as chaves de criptografia e configurar as permissões automaticamente.
    > ⏳ **Nota:** A primeira execução pode levar alguns minutos.

---

## 🔗 Acesso à Aplicação

| Serviço | URL | Descrição |
| :--- | :--- | :--- |
| **Aplicação Web** | [http://localhost:8000](http://localhost:8000) | Interface principal do sistema Laravel. |
| **Gerenciador DB** | [http://localhost:8080](http://localhost:8080) | Interface gráfica **Adminer** para gerenciar o banco de dados. |

---

## 🔑 Credenciais de Acesso

### 👤 Usuário do Sistema
Para acessar a área administrativa da aplicação:

* **Login:** `admin`
* **Senha:** `admin123`

### 🗄️ Banco de Dados (PostgreSQL)
Caso precise acessar o banco via **Adminer** ou outra ferramenta externa:

| Parâmetro | Valor |
| :--- | :--- |
| **Sistema** | PostgreSQL |
| **Servidor (Host)** | `db` |
| **Usuário** | `laravel` |
| **Senha** | `secret` |
| **Banco de Dados** | `avaliacoes` |

---

## 🛠️ Tecnologias Utilizadas

* **Backend:** PHP 8.2, Laravel Framework
* **Frontend:** Blade Templates, Chart.js (Gráficos), CSS Customizado
* **Banco de Dados:** PostgreSQL 16
* **Infraestrutura:** Docker, Apache

---

## 📝 Estrutura do Ambiente

O ambiente Docker é composto por 3 serviços principais:
1.  **app**: Container da aplicação Laravel (PHP + Apache).
2.  **db**: Banco de dados PostgreSQL.
3.  **adminer**: Ferramenta leve para gestão do banco de dados via navegador.

---

> Desenvolvido por **Luis Felipe Frutuoso Barni**
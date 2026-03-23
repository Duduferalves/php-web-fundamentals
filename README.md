# PHP Web Fundamentals 🚀

Este repositório atua como um ambiente isolado para o desenvolvimento e validação de fundamentos da linguagem PHP, manipulação de estruturas de dados em memória e processamento de requisições HTTP. 

O objetivo arquitetural aqui não é o design de sistemas complexos, mas sim a consolidação da sintaxe, lógica de programação pura e a transição do ambiente de terminal (CLI) para o modelo Cliente-Servidor web clássico.

## 🛠 Stack Tecnológica e Infraestrutura

A padronização do ambiente é garantida via conteinerização, eliminando o problema de "na minha máquina funciona" e a necessidade de instalações locais poluentes (como XAMPP).

* **Linguagem:** PHP 8.2 (Rodando via Apache)
* **Frontend:** HTML5 e CSS3 (Renderização Server-Side)
* **Infraestrutura:** Docker e Docker Compose
* **Arquitetura:** Front Controller para roteamento de exercícios

## 📂 Estrutura de Diretórios e Contextos

O código está segregado por contexto de execução para manter a coesão:

* **`public/`**: O Document Root do servidor. Contém o `index.php` (Dashboard) e os ativos de estilo (CSS).
* **`src/lista-01-fundamentos/`**: Scripts focados em lógica pura (Variáveis, Loops, Arrays, Condicionais e Desafios).
* **`src/lista-02-formularios/`**: Aplicações que exigem interação com o protocolo HTTP (GET/POST) e renderização de formulários HTML.
* **`src/templates/`**: Componentes reutilizáveis como `header.php` e `footer.php` para manter a consistência visual dos exercícios.

## 🚀 Como Executar Localmente

### Pré-requisitos
* [Docker](https://www.docker.com/) instalado e rodando.
* [Docker Compose](https://docs.docker.com/compose/) (geralmente incluído no Docker Desktop).

### Passo a Passo

1. **Clone este repositório:**
   ```bash
   git clone https://github.com/SEU-USUARIO/php-web-fundamentals.git
   cd php-web-fundamentals
   ```

2. **Suba o ambiente com Docker:**
   No diretório raiz do projeto, execute:
   ```bash
   docker-compose up -d --build
   ```
   *O parâmetro `-d` roda o container em background e `--build` garante que a imagem seja construída com as configurações mais recentes.*

3. **Acesse o Dashboard:**
   Abra o seu navegador e acesse:
   [http://localhost:8080](http://localhost:8080)

4. **Navegue pelos Exercícios:**
   O Dashboard listará automaticamente todos os arquivos `.php` dentro da pasta `src/`. Basta clicar no exercício desejado para executá-lo.

## 🛠 Comandos Úteis

* **Ver logs do container:**
  ```bash
  docker logs -f php_web_fundamentals
  ```
* **Parar o ambiente:**
  ```bash
  docker-compose down
  ```
* **Reiniciar o container:**
  ```bash
  docker-compose restart
  ```

---
Desenvolvido para fins acadêmicos e consolidação de fundamentos em PHP.

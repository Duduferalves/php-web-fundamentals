# PHP Web Fundamentals

Este repositório atua como um ambiente isolado para o desenvolvimento e validação de fundamentos da linguagem PHP, manipulação de estruturas de dados em memória e processamento de requisições HTTP. 

O objetivo arquitetural aqui não é o design de sistemas complexos, mas sim a consolidação da sintaxe, lógica de programação pura e a transição do ambiente de terminal (CLI) para o modelo Cliente-Servidor web clássico.

## 🛠 Stack Tecnológica e Infraestrutura

A padronização do ambiente é garantida via conteinerização, eliminando o problema de "na minha máquina funciona" e a necessidade de instalações locais poluentes (como XAMPP).

* **Linguagem:** PHP 8.2 (Rodando via Apache)
* **Frontend:** HTML5 e CSS3 (Renderização Server-Side)
* **Infraestrutura:** Docker e Docker Compose

## 📂 Estrutura de Diretórios e Contextos

O código está segregado por contexto de execução para manter a coesão:

* `/lista-01-logica-basica`: Scripts focados em lógica pura (Variáveis, Loops, Arrays, Condicionais). Podem ser validados via CLI ou Web.
* `/lista-02-http-forms`: Aplicações que exigem interação com o protocolo HTTP (GET/POST) e renderização de formulários HTML (Calculadora, Sistema de Notas, etc.).

## 🚀 Como Executar Localmente

### Pré-requisitos
* [Docker](https://www.docker.com/) instalado e rodando.
* Git para versionamento.

### Passo a Passo

1. Clone este repositório:
```bash
git clone [https://github.com/SEU-USUARIO/php-web-fundamentals.git](https://github.com/SEU-USUARIO/php-web-fundamentals.git)
cd php-web-fundamentals

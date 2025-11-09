-- ================================================
-- BANCO DE DADOS: Sistema de Avaliação de Qualidade
-- AUTOR: Luis Felipe Frutuoso Barni
-- DISCIPLINA: Programação Web 1
-- BANCO: PostgreSQL
-- ================================================

-- ================================================
-- 1. Usuários Administrativos
-- ================================================
CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    login VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    data_criacao DATE DEFAULT CURRENT_DATE
);

-- ================================================
-- 2. Setores
-- ================================================
CREATE TABLE setores (
    id SERIAL PRIMARY KEY,
    descricao VARCHAR(100) NOT NULL
);

-- ================================================
-- 3. Dispositivos
-- ================================================
CREATE TABLE dispositivos (
    id SERIAL PRIMARY KEY,
    descricao VARCHAR(100) NOT NULL,
    status BOOLEAN DEFAULT TRUE,
    setor_id INT REFERENCES setores(id) ON DELETE SET NULL
);

-- ================================================
-- 4. Perguntas
-- ================================================
CREATE TABLE perguntas (
    id SERIAL PRIMARY KEY,
    texto TEXT NOT NULL,
    ordem INTEGER,
    status BOOLEAN DEFAULT TRUE
);

-- ================================================
-- 5. Respostas
-- ================================================
CREATE TABLE respostas (
    id SERIAL PRIMARY KEY,
    dispositivo_id INT REFERENCES dispositivos(id) ON DELETE CASCADE,
    pergunta_id INT REFERENCES perguntas(id) ON DELETE CASCADE,
    nota INT CHECK (nota BETWEEN 0 AND 10),
    texto TEXT,
    data_resposta TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ================================================
-- 6. Feedbacks abertos
-- ================================================
CREATE TABLE feedbacks (
    id SERIAL PRIMARY KEY,
    dispositivo_id INT REFERENCES dispositivos(id) ON DELETE CASCADE,
    data_feedback TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    texto TEXT
);
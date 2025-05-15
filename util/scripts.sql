INSERT INTO
    usuarios (
        id_usuario,
        nome,
        cpf,
        data_nascimento,
        celular,
        rua,
        numero,
        complemento,
        bairro,
        cidade,
        estado,
        cep,
        email,
        senha,
        tipo,
        created_at,
        updated_at,
        delete_at
    )
VALUES
    (
        NULL,
        'Luis Otávio Toschi',
        '437.121.548.36',
        '1999-05-14',
        '+55 (14) 99908-2002',
        'Rua Gumercindo da Silva Floret',
        '434',
        'Apto 431',
        'Jd. América',
        'Jaú',
        'SP',
        '17210-640',
        'luistoschi8@gmail.com',
        '8967@ç34ñ',
        'Administrador',
        current_timestamp(),
        current_timestamp(),
        NULL
    );
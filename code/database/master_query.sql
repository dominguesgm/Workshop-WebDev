SELECT * FROM apontamentos, cadeiras WHERE apontamentos.cadeira = cadeiras.id
        AND (sigla LIKE :nomeCadeira OR cadeiras.nome LIKE :nomeCadeira)
        AND apontamentos.nome LIKE :nomeApontamento
        AND descricao LIKE :descricao
        AND autor LIKE :autor
        AND ano = :ano
        AND semestre = :semestre;


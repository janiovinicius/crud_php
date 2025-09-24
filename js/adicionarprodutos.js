

        // Seleciona o elemento de input pelo ID
        const precoElement = document.getElementById('preco');

        // Define as opções da máscara para o formato de moeda brasileira
        const maskOptions = {
            mask: 'R$ num', // Define que o valor será numérico
            blocks: {
                num: {
                    mask: Number,
                    scale: 2, // 2 casas decimais
                    thousandsSeparator: '.', // Separador de milhar
                    padFractionalZeros: true, // Adiciona zeros se necessário (ex: 10,5 -> 10,50)
                    radix: ',', // Separador decimal
                    mapToRadix: ['.'], // Mapeia o ponto do teclado para a vírgula decimal
                    min: 0 // Valor mínimo
                }
            }
        };
        
        // Aplica a máscara ao elemento
        const mask = IMask(precoElement, maskOptions);

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/08/2024 às 20:29
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `catalogo_animes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `animes`
--

CREATE TABLE `animes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `categoria` varchar(50) NOT NULL,
  `descricao` text DEFAULT NULL,
  `avaliacao` decimal(3,1) DEFAULT NULL,
  `resenha` text DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `animes`
--

INSERT INTO `animes` (`id`, `titulo`, `imagem`, `categoria`, `descricao`, `avaliacao`, `resenha`, `data_cadastro`, `user_id`) VALUES
(72, 'Mashle Muscle', '../uploads/mash.png', 'esperando', 'Ação, Aventura e Fantasia - Em um mundo onde todos usam magia, Mash Burnedead (vulgo filho do Saitama) treinou a vida toda para compensar sua falta de poderes mágicos. Na base da porrada, ele enfrentará vários magos poderosos para conquistar seu objetivo.', 8.6, 'Definitivamente um anime muito bom. Ele tem bastante comédia e, em vários momentos, deixa você empolgado com o Mash usando apenas sua força de maneira inusitada para derrotar seus inimigos. Apesar de ter bastante foco em comédia, o anime segue uma história contínua e vai avançando. É um anime que você pode começar desde o primeiro episódio e vai sentir vontade de assistir até o último. Recomendo demais.', '2024-07-27 23:40:01', 1),
(74, 'Classroom of the Elite', '../uploads/class.jpg', 'esperando', 'Comédia, Drama e Suspense Psicológico - Anime que mostra a vida em um colégio de elite com várias provas diferenciadas com vários alunos habilidosos focando na história do brabo, frio e calculista Kiyotaka Ayanokouji.', 9.3, 'Com certeza um dos meus animes favoritos, ele tem uma história bem interessante e apesar de alguns episódios com a qualidade abaixo da média, cada um dos episódios é único e serve para acrescentar na história, mostrando como um dos melhores protagonistas dos animes se vira em diferentes tipos de situações.', '2024-07-27 23:48:26', 1),
(75, 'Solo Leveling', '../uploads/solo.png', 'esperando', 'Ação e Fantasia - Há mais de uma década, surgiu um portal que conecta nosso mundo a uma dimensão diferente, despertando poderes únicos em algumas pessoas chamadas \"caçadores\". Sung Jinwoo, o caçador mais fraco, se depara com uma \"masmorra dupla\" e, gravemente ferido, aceita uma misteriosa missão. Ao fazê-lo, torna-se a única pessoa capaz de subir de nível, transformando-se em um caçador muito poderoso.', 8.5, 'Pegada de protagonista muito fraco que consegue se tornar o mais poderoso. Em pouco tempo, ele vai evoluindo suas habilidades, mas vai perdendo sua humanidade. Pelo que assisti, gostei muito e recomendo. Espero que até o final mantenha a qualidade. Animação impecável, trilha sonora excelente e boa história.', '2024-07-28 00:00:22', 1),
(76, 'Toradora!', '../uploads/toradora.png', 'assistidos', 'Comédia Romântica e Slice of Life - Ryuji é mal interpretado por causa de seu olhar ameaçador, fazendo todos pensarem que ele é um delinquente. No segundo ano do ensino médio, ele encontra Aisaka Taiga, uma garota pequena apelidada de \"Tigre de Bolso\" por sua personalidade egoísta e explosiva. Taiga é uma das presenças mais temidas na escola, assim como Ryuji. A história segue o dia a dia desses personagens e seus colegas.', 8.8, 'Um dos melhores animes do gênero, anime que desenvolve muito bem uma história de romance e é bem relaxante e divertido de assistir, infelizmente achei que o final poderia ter sido um pouco melhor elaborado, mas terminou de maneira positiva, mesmo que tenham dado uma ratiada.', '2024-07-28 00:10:55', 1),
(77, 'Charlotte', '../uploads/Charlotte.png', 'assistidos', 'Comédia, drama e fantasia - Alguns adolescentes veem brotar habilidades especiais. Yu Otasaka é um desses garotos, mas ele usa suas habilidades sem o conhecimento de outras pessoas para poder ter uma vida escolar satisfatória. Certo dia, uma garota chamada Nao Tomori aparece repentinamente na frente dele. Desse encontro revela-se o destino para os jovens que detêm habilidades especiais.', 7.8, 'Do começo ao fim do anime, ele segue evoluindo muito bem a história, tendo uma boa reviravolta durante o anime, como todo final criado por japonês, apesar de ter sido positivo, teve algumas coisas que poderiam ter sido melhores, mas é um anime bem honesto e pouco lembrado.', '2024-07-28 00:19:57', 1),
(80, 'Death Note', '../uploads/Death Note.png', 'assistidos', 'Mistério e Suspense Psicológico - Conta a história de Light Yagami, um estudante brilhante que encontra um caderno sobrenatural que permite que ele mate qualquer pessoa cujo nome seja escrito nele, desde que conheça o rosto da vítima. Decidido a usar o Death Note para livrar o mundo do mal, Light assume o alter ego \"Kira\" e inicia uma campanha para eliminar criminosos como deus do novo mundo. Sua missão atrai a atenção de \"L\", um detetive enigmático, e começa um intenso jogo de gato e rato entre os dois.', 9.0, 'Se estendeu além do que deveria, tanto que quando é citado sobre o anime a maioria não lembra do que segue a história com Mello e Near e o final do anime é um pouo diferente do Mangá, mas é um anime muito bom e que vale a pena ser assistido. Talvez eu não esteja sendo honesto com a avaliação mas é um anime que definiu bastante dos meus gostos.', '2024-07-28 00:50:45', 1),
(81, 'Tower of God', '../uploads/Tower of God.png', 'assistindo', 'Ação e Fantasia Sombria - Um mundo repleto de um misterioso poder chamado Shinsu, e povoado pelos \"regulares\", os indivíduos dotados desse poder. Dizem as lendas que quem alcançar o topo da Torre terá seus desejos realizados. Os guardiões da Torre selecionam \"regulares\" para participar das provações da torre e tentar alcançar seu ápice.', 8.3, 'Até onde vi o anime gostei bastante, a primeira temporada inteira segue uma linha e na segunda ele tem um grande time-skip que faz com que o protagonista de bobinho e sem conhecimento do seu poder se torne alguém muito poderoso e com uma mentalidade completamente diferente.', '2024-07-28 00:57:28', 1),
(82, 'Alya Sometimes Hides Her Feelings in Russian', '../uploads/alya.png', 'assistindo', 'Alya é uma aluna transferida bastante popular em sua nova escola, frequentemente exibindo uma atitude fria enquanto tira notas altas. Ela ignora seu colega exceto quando solta algumas frases de flerte em russo para ele. Mal sabe ela que Kuze entende russo, embora finja que não.', 8.8, 'Muito cedo para fazer uma avaliação 100% mas posso dizer que pelo que vi do anime é um excelente Slice of Life com comédia romântica, cada episódio que lança é uma experiência incrível e com ótimo desenvolvimento, sem contar no protagonista que não é como a maioria dos animes de romance, é um protagonista que faz o que deve ser feito, lembrando o Sakuta de Bunny Girl.', '2024-07-28 01:03:47', 1),
(83, 'The Fruit of Grisaia', '../uploads/grisaia.png', 'assistidos', 'Drama, suspense e mistério - Gira em torno de um jovem com um passado sombrio que se matricula na Mihama Academy, uma escola especial para estudantes com problemas. Lá, ele encontra cinco alunas, cada uma com suas próprias histórias traumáticas. À medida que Yuuji se aproxima delas, segredos dolorosos são revelados e ele tenta ajudá-las a encontrar redenção e paz, enquanto também enfrenta seus próprios demônios internos.', 8.7, 'Particularmente é um anime que gostei demais, a cada episódio que passa a história vai se tornando cada vez mais complexa e envolvente, tem um plot muito bom e aborda alguns temas pesados em certas partes do anime, seria um anime que eu facilmente recomendaria para os outros assistirem.', '2024-07-28 03:10:56', 1),
(84, 'ReLIFE', '../uploads/ReLIFE.png', 'assistidos', 'Comédia, Drama, Romance e Slice of Life - Segue Arata Kaizaki, um homem de 27 anos desempregado e sem rumo, que participa de um experimento que o faz parecer dez anos mais jovem. Retornando ao ensino médio por um ano, ele tem a chance de recomeçar sua vida. Durante esse tempo, enfrenta os desafios e alegrias da adolescência, aprendendo lições valiosas sobre amizade, amor e o que realmente importa na vida.', 8.3, 'É um anime que consegue misturar comédia, drama e romance de maneira harmoniosa, proporcionando uma experiência envolvente e emocional. O enredo central de voltar ao ensino médio com a perspectiva e a maturidade de um adulto é tratado de forma inteligente, trazendo reflexões profundas sobre arrependimentos, crescimento pessoal e a importância das conexões humanas. Os personagens são bem desenvolvidos, cada um com suas próprias histórias e lutas, o que enriquece a narrativa e faz com que o espectador se importe com suas jornadas. Tem um final fechado satisfatório.', '2024-07-28 03:18:05', 1),
(85, 'The Quintessential Quintuplets', '../uploads/The Quintessential Quintuplets.png', 'assistidos', 'Comédia Romântica e Harém -  um estudante do segundo ano do colegial que vem de uma família pobre, recebe uma irrecusável proposta para trabalhar como tutor. e descobre que suas pupilas são suas colegas de classe! E pra piorar, são gêmeas quíntuplas... Todas lindíssimas, mas com péssimas notas e um ódio mortal pelos estudos.', 7.6, 'Um anime bom de acompanhar, bem divertido e que cumpre o que propõe, ele tem um final fechado mas tem finais alternativos onde o protagonista fica no final com outras personagens. Como cada uma é diferente e com uma personalidade única, cria um contraste legal de ser assistido.', '2024-07-28 03:26:27', 1),
(88, 'The Detective is Already Dead', '../uploads/The detective is already dead.png', 'assistidos', 'Ação, Drama, Mistério e Sobrenatural - Barrar o sequestro de um avião ao lado da bela detetive de cabelos prateados, Siesta, transforma a vida do jovem Kimihiko. O sucesso dos dois os lança em solucionar crimes e confrontar organizações mundo afora por anos até a morte de Siesta. Deixado para trás cheio de perguntas, Kimihiko segue com sua vida. Mas agora, um novo caso pode reabrir as feridas curadas ao se conectar com um assassino, uma conspiração mundial e sua parceira morta!', 8.4, 'Pelo que me lembro desse anime, ele tem um final fechado e uma história bem construida. Me lembro que me emocionou e me marcou bastante na época que assisti ele, com certeza é uma excelente opção para assistir.', '2024-07-28 03:47:17', 1),
(89, 'Bunny Girl Senpai', '../uploads/Bunny Girl Senpai.png', 'assistidos', 'Drama, Ficção Científica, Mistério, Romance e Sobrenatural - O protagonista encontra uma ex-atriz famosa vestida de coelhinha, vagando pela biblioteca sem ninguém enxergar ela pois ela está sofrendo de um fenômeno misterioso chamado \"Síndrome da Adolescência,\" onde problemas emocionais se manifestam fisicamente. Enquanto Sakuta ajuda Mai a resolver seu problema, ele encontra outras garotas com diferentes casos da Síndrome, ajudando cada uma delas enquanto lida com seus próprios desafios pessoais e relacionamentos.', 9.0, 'Anime incrível que vai se desenvolvendo com muita maluquisse de ficção científica envolvendo casos sobrenaturais. Segue um protagonista muito sincero que faz as coisas quando deve ser feito e que tem um contraste incrível com a Mai, tendo também um filmaço emocionante. Certamente um dos meus animes favoritos.', '2024-07-28 03:58:52', 1),
(101, 'teste', 'tamanho 2000x2000.png', 'assistidos', 'a', 4.0, 'r', '2024-08-22 21:04:59', 4),
(102, 'a', 'perfil image.png', 'assistidos', 'a', 2.9, '1', '2024-08-22 22:19:25', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'Kalleby', '92659580', 'kallebyschultz@gmail.com', 'admin'),
(2, 'Jonathan Robert', '$2y$10$Gec3t.z.C.zIDxxuRHj2/ONTyZmzk7VnzU9Nk/.vz7wGCjxwgW/ay', 'joninha@gmail.com', 'user'),
(3, 'KallebySchultz', 'senha', 'ksinformatica010@gmail.com', 'user'),
(4, 'User', '123456', 'userteste@gmail.com', 'user'),
(5, 'Teste', 'senha', 'testando@gmail.com', 'user'),
(6, 'Joelson', 'senha', 'joelson@gmail.com', 'user');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `animes`
--
ALTER TABLE `animes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `animes`
--
ALTER TABLE `animes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `animes`
--
ALTER TABLE `animes`
  ADD CONSTRAINT `animes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

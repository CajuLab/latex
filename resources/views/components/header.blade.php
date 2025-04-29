% header.tex

\usepackage{graphicx} % Required for inserting images
\usepackage{eso-pic} % Required for adding content to every page
\usepackage{tikz} % Required for drawing shapes
\usetikzlibrary{calc} % Required for coordinate calculation
\usepackage{xcolor} % Required for customizing colors
\usepackage{fancyhdr}
\usepackage{geometry}
\usepackage[scaled]{helvet}
\renewcommand{\familydefault}{\sfdefault} % Define Helvetica como a fonte principal

% Define the border style with padding and thickness
\AddToShipoutPictureBG{%
    \begin{tikzpicture}[remember picture, overlay]
        % Draw a rectangle with padding and thick border
        \draw[thick, black!70, line width=3pt] % Customize thickness and color here
            ($(current page.north west) + (1cm,-1cm)$) --
            ($(current page.north east) + (-1cm,-1cm)$) --
            ($(current page.south east) + (-1cm,1cm)$) --
            ($(current page.south west) + (1cm,1cm)$) -- cycle;
        \draw[thick, black!70, line width=2pt] % Customize thickness and color here
            ($(current page.north west) + (1.12cm,-1.12cm)$) --
            ($(current page.north east) + (-1.12cm,-1.12cm)$) --
            ($(current page.south east) + (-1.12cm,1.12cm)$) --
            ($(current page.south west) + (1.12cm,1.12cm)$) -- cycle;
    \end{tikzpicture}%
}

\pagestyle{fancy}

\fancyhf{}

\geometry{
    top=5.5cm,       % Margem superior total (inclui cabeçalho + espaçamento)
    headheight=3cm,  % Altura do cabeçalho (ajuste conforme o conteúdo)
    headsep=1cm,     % Espaço entre o cabeçalho e o corpo do texto
    bottom=3cm,      % Margem inferior
    left=3cm,        % Margem esquerda
    right=3cm        % Margem direita
} % Configuração do documento inteiro

\fancyhfoffset[L]{1cm}
\fancyhfoffset[R]{1cm}

\lhead{\raisebox{0.5cm}{ {\includegraphics[width=2.5cm]{ {{ storage_path('app/public/logo.png') }} } } } }
\rhead{\raisebox{0.5cm}{ {\includegraphics[width=2.5cm]{ {{ storage_path('app/public/logosecretaria.png') }} } } } }

\chead{
    \centering
    \textbf{ESTADO DO PIAUÍ} \\
    \textbf{ {{ $prefeitura }} } \\
    \textbf{SECRETARIA MUNICIPAL DE EDUCAÇÃO} \\
    \textbf{GABINETE DA SECRETÁRIA} \\
    \textnormal{CNPJ: 30.006.293/0001-85} \\
    \textnormal{Rua Alfredo Lages, 380 – Centro} \\
    \raisebox{0.2cm}{\rule{12cm}{0.5pt}}
}

\renewcommand{\headrulewidth}{0pt}

\lfoot{\sffamily{Nossa Senhora dos Remédios – Piauí}}
\cfoot{\sffamily{Fone: (86) 3245-1204}}
\rfoot{\sffamily{CEP: 64140.000}}

\renewcommand{\footrulewidth}{0.1pt}

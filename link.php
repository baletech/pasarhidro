<head>
    <style>
        *{
            box-sizing: border-box;
        }
        .link a{
            display: flex;
            color: var(--dark);
            width: 16em;
            padding: 1em 2em 1em 5em;
            background-color: #eaeaea;
        }
        .link a:hover{
            display: flex;
            color: var(--dark);
            width: 16em;
            padding: 1em 2em 1em 5em;
            background-color: #f0f0f0;
            font-weight: bold;
            border-right: 5px solid var(--light);
        }
        .link{
            display: flex;
            flex-flow: column;
            width: 16em;
            height: 91vh;
            padding-top: 1em;

            background-color: #eaeaea;
            border-right: 2px solid #e1e1e1;
            position: sticky;
            top: 60px;
            z-index: 0;
        }

    </style>
</head>
<body>
    <div class="link">
        <a href="dashboard.php">
            Dashboard
        </a>
        <a href="data-produk.php">
            Data Produk
        </a>
        <a href="tambah-produk.php">
            Tambah Produk
        </a>
        <a href="profil.php">
            Profil
        </a>
    </div>
</body>
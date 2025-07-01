<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        height: 100vh;
        background-color: #fce4ec;
    }

    .container {
        display: flex;
        width: 100%;
        max-width: 100%;
        background: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 0;
    }

    .left-section {
        flex: 2;
        background-color: rgb(134, 154, 222);
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .logo {
        position: absolute;
        top: 50px;
        left: 40px;
    }

    .logo img {
        width: 100px;
    }

    .logo2 {
        display: none;
        justify-content: center;
        /* Memusatkan logo secara horizontal */
        margin-bottom: 20px;
        padding: 1rem;
    }

    .logo2 img {
        width: 100px;
    }

    .shape {
        position: absolute;
        bottom: 0px;
        margin: 0;
        padding: 0;
        z-index: 1;
        overflow: hidden;
        line-height: 0;
        width: 100%;
        max-width: 100%;
    }

    .shape img {
        width: 100%;
        height: 10%;
    }

    .illustration img {
        max-width: 100%;
        height: auto;
        position: relative;
        width: 500px;
        /* Memastikan elemen bisa diatur dengan z-index */
        z-index: 2;
    }

    .right-section {
        flex: 1;
        padding: 80px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .right-section-reset-password {
        display: none;
        padding: 80px;
        flex: 1;
        flex-direction: column;
        justify-content: center;
    }

    h2 {
        color: #6610f2;
        margin-bottom: 10px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    input {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        background-color: #6610f2;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #5f76e8;
    }

    .options {
        display: flex;
        justify-content: space-between;
        font-size: 12px;
        margin-bottom: 40px;
    }

    .options a {
        color: blueviolet;
        flex: 1;

    }

    .options a:hover {
        color: #5f76e8;
    }

    .custom-shape-divider-bottom-1736385524 {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        transform: rotate(180deg);
        z-index: 1;
    }

    .custom-shape-divider-bottom-1736385524 svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 235px;
    }

    .custom-shape-divider-bottom-1736385524 .shape-fill {
        fill: #5f76e8;
    }

    .form-control {
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        color: #555;
        font-size: 14px;
        cursor: pointer;
        width: 100%;
        padding: 10px;
        border: 1px solid blueviolet;
    }

    .form-control:hover {
        background-color: #f9f9f9;
        /* Warna latar belakang */
        border: 2px solid blueviolet;
    }

    .form-control:focus {
        outline: none;
        /* Hilangkan outline bawaan */
        border-color: blueviolet;
        /* Warna border saat fokus */
        box-shadow: 0 0 5px blueviolet;
        /* Efek bayangan saat fokus */
    }

    label {
        font-size: 14px;
        color: rgb(111, 111, 111);
        margin-bottom: 6px;
    }

    #togglePassword {
        position: absolute;
        right: 35px;
        /* left: 35px; */
        /* Jarak ke kanan */
        top: 35%;
        /* Untuk memastikan ikon berada di tengah vertikal */
        transform: translateY(-50%);
        /* Mengatur ikon agar sejajar dengan teks */
        cursor: pointer;
        font-size: 18px;
        color: #ccc;
        /* Warna default ikon */
        z-index: 2;
        /* Pastikan di atas elemen lain */
    }

    #togglePassword:hover {
        color: blueviolet;
        /* Ganti warna ikon saat hover */
    }


    .footer {
        text-align: center;
        /* Teks berada di tengah */
        font-size: 14px;
        /* Sesuaikan ukuran font */
        margin-top: auto;
        /* Dorong footer ke bawah */
        padding: 10px 0;
        /* Opsional: Tambahkan latar belakang */
    }

    .fade-out {
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .btn-disabled {
        opacity: 0.6;
        /* Mengurangi opacity */
        cursor: not-allowed;
        /* Ubah kursor menjadi tidak diizinkan */
    }

    @media (max-width: 2560px) {

        .logo img {
            width: 300px;
        }

        /* h2 {
                font-size: 70px;
            }

            p {
                font-size: 44px;
            }

            label {
                font-size: 44px;
                margin-bottom: 20px;
            }

            .options a {
                font-size: 44px;
                margin-bottom: 40px;

            }

            button {
                font-size: 49px;
                border-radius: 10px;
            }

            .form-control {

                font-size: 44px;
                cursor: pointer;
                width: 100%;
                padding: 10px;
                border-radius: 10px;
                border: 1px solid blueviolet;
            } */

        /* .shape img {
                width: 1650px;
            } */

        .illustration img {
            width: 920px;
            padding-top: 30px;
        }
    }

    @media (max-width: 2300px) {

        .logo img {
            width: 100px;
        }


        .illustration img {
            width: 600px;
        }
    }

    @media (max-width: 1439px) {

        .logo img {
            width: 100px;
        }


        .illustration img {
            width: 500px;
            /* padding-top: 60px; */
        }
    }

    @media (max-width: 1024px) {

        .logo img {
            width: 100px;
        }


        .illustration img {
            width: 460px;
            padding-top: 50px;
        }
    }

    @media (max-width: 768px) {

        .logo img {
            width: 70px;
        }


        .illustration img {
            width: 300px;
            padding-top: 120px;
        }
    }

    @media (max-width: 426px) {

        .logo2 {
            display: flex;
        }

        h2 {
            font-size: 20px;
        }

        p {
            font-size: 14px;
        }

        .left-section {
            display: none;
        }
    }
</style>
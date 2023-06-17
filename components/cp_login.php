
<section>
    <h1 class="titulos">LOGIN</h1>
    <p class="texto_grande">CLICA AQUI PARA TE <a href="../registo.php">REGISTARES</a></p>
    <div>

        <div>


            <form class="form-width" action="./scripts/sc_login.php" method="post" class="was-validated">
                <div>
                    <label for="uname" class="form-label texto_grande">Username:</label>
                    <input type="text" class="form-control" id="username"
                           placeholder="Enter username" name="username" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div>
                    <label for="pwd" class="form-label texto_grande">Password:</label>
                    <input type="password" class="form-control" id="password"
                           placeholder="Enter password" name="password" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="button-container">
                <button type="submit" class="botão">Submit</button>
                </div>
            </form>
        </div>
    </div>


</section>



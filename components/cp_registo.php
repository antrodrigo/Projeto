<section>
    <div>
        <div>

            <form action="./scripts/sc_registo.php" method="post">
                <div>
                    <label for="uname" >Name:</label>
                    <input type="text" id="name"
                           placeholder="Enter name" name="name" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div>
                    <label for="uname" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email"
                           placeholder="Enter email" name="email" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div>
                    <label for="uname" class="form-label">Login:</label>
                    <input type="text" class="form-control" id="login"
                           placeholder="Enter login" name="login" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div>
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password"
                           placeholder="Enter password" name="password" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <button type="submit" class="botão">Continuar</button>
            </form>
        </div>
    </div>
</section>


<style>
html {
    width: 100%;
    height: 100%;
}

.overlay,
.form-panel.one:before {
    position: absolute;
    top: 0;
    left: 0;
    display: none;
    background: rgba(0, 0, 0, 0.8);
    width: 100%;
    height: 100%;
}

.form {
    z-index: 15;
    position: relative;
    background: #FFFFFF;
    width: 600px;
    border-radius: 4px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
    box-sizing: border-box;
    margin: 100px auto 10px;
    overflow: hidden;
}

.form-group {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 0 0 20px;
}

.form-group:last-child {
    margin: 0;
}

.form-group label {
    display: block;
    margin: 0 0 10px;
    color: rgba(0, 0, 0, 0.6);
    font-size: 12px;
    font-weight: 500;
    line-height: 1;
    text-transform: uppercase;
    letter-spacing: 0.2em;
}

.two .form-group label {
    color: #FFFFFF;
}

.form-group input {
    outline: none;
    display: block;
    background: rgba(0, 0, 0, 0.1);
    width: 100%;
    border: 0;
    border-radius: 4px;
    box-sizing: border-box;
    padding: 12px 20px;
    color: rgba(0, 0, 0, 0.6);
    font-family: inherit;
    font-size: inherit;
    font-weight: 500;
    line-height: inherit;
    transition: 0.3s ease;
}

.form-group input:focus {
    color: rgba(0, 0, 0, 0.8);
}

.two .form-group input {
    color: #FFFFFF;
}

.two .form-group input:focus {
    color: #FFFFFF;
}

.form-group button {
    outline: none;
    background: #ff3126;
    width: 100%;
    border: 0;
    border-radius: 4px;
    padding: 12px 20px;
    color: #FFFFFF;
    font-family: inherit;
    font-size: inherit;
    font-weight: 500;
    line-height: inherit;
    text-transform: uppercase;
    cursor: pointer;
}

.two .form-group button {
    background: #FFFFFF;
    color: #4285F4;
}

.form-group .form-remember {
    font-size: 12px;
    font-weight: 400;
    letter-spacing: 0;
    text-transform: none;
}

.form-group .form-remember input[type=checkbox] {
    display: inline-block;
    width: auto;
    margin: 0 10px 0 0;
}

.form-group .form-recovery {
    color: #4285F4;
    font-size: 12px;
    text-decoration: none;
}

.form-panel {
    padding: 60px calc(5% + 60px) 60px 60px;
    box-sizing: border-box;
}
</style>

<!-- Form-->
<div class="form">
    <div class="form-toggle"></div>
    <div class="form-panel one">
        <div class="form-header">
            <h1>Account Login</h1>
        </div>
        <div class="form-content">
            <form action="login" method="post">

                <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                    name="email"
                    type="email" 
                    id="username" 
                    placeholder="Email address"
                    required="" autofocus="" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Password" 
                    required="" />
                </div>

                <div class="form-group">
                    <label class="form-remember">
                    </label><a class="form-recovery" href="registration">Create an account?</a>
                </div>
                <div class="form-group">
                    <button 
                    type="submit" 
                    name="login"
                    class="btn btn-danger btn-block text-uppercase mb-2 rounded-pill shadow-sm">
                    Log In</button>
                </div>
            </form>
        </div>
    </div>
</div>
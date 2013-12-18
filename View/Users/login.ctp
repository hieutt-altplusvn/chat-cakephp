<div class="container">
    
    <?php 
    echo $this->Form->create('User', array(
                    'class' => 'form-signin'
                )
    );
    echo '<h3 class="form-signin-heading">Welcome to chat system</h3>';
    echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Username', 'label' => false));
    echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Password', 'label' => false));
    ?>
    <label class="checkbox">
        <input type="checkbox" value="remember-me"> Remember me
    </label>
        <?php
    echo $this->Form->submit(__('Login',true), array('class'=>'btn btn-lg btn-primary btn-block')); 

    echo '<a href="register">Register new user</a>';
    
    echo '<div class="status">'.$this->Session->flash('login').'</div>';
    echo $this->Form->end();
    ?>
</div>
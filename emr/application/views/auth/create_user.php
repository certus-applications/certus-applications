<h1><?php echo lang('create_user_heading');?></h1>
<p><?php echo lang('create_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_user");?>

      <p>
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>
      
      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>

      <p>
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
      </p>

      <p>
            <?php echo lang('create_user_employeeid_label', 'employeeid');?> <br />
            <?php
            $result = '';
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $array = str_split($characters);
            $charactersLength = strlen($characters);

            for ($i = 0; $i < 6; $i++ ) {
              // $result += $characters.charAt(Math.floor(Math.random() * $charactersLength));
              $result .= $array[array_rand($array)];
            }

            $generateEmployeeid = $result;  
            $data = [
              'id' => 'employeeid',
              'value' => $generateEmployeeid,
              'type' => 'text',
              'name' => 'employeeid',
              'readonly' => 'readonly'
            ];
            echo form_input($data);
            ?>
            <!-- <?php echo form_input($employeeid);?> -->
      </p>

      <p>
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
      </p>

      <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
              <label class="checkbox">
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>" <?php echo ($group['id'] == 4) ? 'checked="checked"' : null; ?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
          <?php endforeach?>

      <?php endif ?>


      <p>
        <?php echo form_submit('submit', lang('create_user_submit_btn'));?>
        <button type="button"><?php echo anchor('auth/index', "Back")?></button>
      </p>

<?php echo form_close();?>

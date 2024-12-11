<div class="profile-container">
    <?php if (!empty($user)): ?>
        <?php foreach ($user as $users): ?>
        <div class="profile-header">
            <h2>
                <a data-toggle="modal" data-target="#editNameModal" style="text-decoration: none; color: inherit;">
                    <?= htmlspecialchars($users['firstname'] ?? 'Set first name') ?> <?= htmlspecialchars($users['lastname'] ?? 'Set last name') ?>
                </a>
            </h2>
        </div>
        <div class="profile-info">
            <h4>Email:</h4>
            <p><?= htmlspecialchars($users['email'] ?? 'Set email') ?></p>
        </div>
        <a class="profile-info" data-toggle="modal" data-target="#editPhoneModal">
            <h4>Phone:</h4>
            <p><?= htmlspecialchars($users['phone'] ?? 'Set phone') ?></p>
            <button type="button" class="btn-edit">></button>
        </a>
        <a class="profile-info" data-toggle="modal" data-target="#editAddressModal">
            <h4>Address:</h4>
            <p><?= htmlspecialchars($users['address'] ?? 'Set address') ?></p>
            <button type="button" class="btn-edit">></button>
        </a>
        <a class="profile-info" data-toggle="modal" data-target="#editGenderModal">
            <h4>Gender:</h4>
            <p><?= htmlspecialchars($users['gender'] ?? 'Set gender') ?></p>
            <button type="button" class="btn-edit">></button>
        </a>
        <a class="profile-info" data-toggle="modal" data-target="#editDobModal">
            <h4>Birthdate:</h4>
            <p><?= htmlspecialchars($users['dob'] ?? 'Set birthdate') ?></p>
            <button type="button" class="btn-edit">></button>
        </a>
        <div class="profile-info" data-toggle="modal" data-target="#editRoleModal">
            <h4>Role:</h4>
            <p><?= htmlspecialchars($users['class']) ?></p>
            <button type="button" class="btn-edit">></button>
        </div>
        <div class="profile-info">
            <h4>Joined:</h4>
            <p><?= htmlspecialchars($users['created_at']) ?></p>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No user data available.</p>
    <?php endif; ?>
</div>
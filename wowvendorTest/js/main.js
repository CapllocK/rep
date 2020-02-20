document.addEventListener('DOMContentLoaded', function() {

    const elems = document.querySelector('select');

    const btn = document.querySelector('.btn');
    const addRoleBtn = document.getElementById('addRole');
    const roleName = document.getElementById('role');
    const addUserBtn = document.getElementById('addUser');
    const userName = document.getElementById('userName');
    const location = document.location.pathname;
    const notice = document.getElementById('notice');
    const rolesList = [];
    const userTable = document.querySelector('tbody');

    checkLocation(location);

    function resetBtns() {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
        });
    }

    function disableBtn(btn) {
        btn.setAttribute('disabled', 'disabled');
    }
    function enableBtn(btn) {
        btn.removeAttribute('disabled');
    }

    function showNotice(text, status) {
        notice.innerText = text;
        notice.style.display = 'block';

        if (status == 1) {
            notice.classList.add('noticeOk');
        } else {
            notice.classList.add('noticeBad');
        }

        hideNotice();
    }
    function hideNotice() {
        setTimeout(() => {
            notice.style.display = 'none';
            notice.innerText = '';
            notice.classList.remove('noticeOk', 'noticeBad');
        }, 3000);
    }
    
    function getAllRoles() {
        fetch('../api/getRoles.php')
            .then(res => res.json())
            .then(data => data.map(item => {
                if (location == '/') {
                    createOpt(item.id, item.rolename);
                } else {
                    rolesList.push(item.rolename);
                }

            }));
    }

    function getUsers() {
        fetch('../api/getUsers.php')
            .then(res => res.json())
            .then(data => data.map(user => {
                createUsersList(user.name, user.role);
            }))
    }

    function createNewUser(data) {
        fetch('../api/createUser.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(data)
        })
            .then(res => res.json())
            .then(data => {
                enableBtn(addUserBtn);
                userName.value = '';
                userName.blur();
                if (data.status == 'User was created.') {
                    showNotice(data.status, 1);
                } else {
                    showNotice(data.status, 0);
                }
            });
    }

    function createRole(data) {
        fetch('../api/createRole.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(data)
        })
            .then(res => res.json())
            .then(data => {
                enableBtn(addRoleBtn);
                roleName.value = '';
                roleName.blur();
                if (data.status == 'Role was created.') {
                    showNotice(data.status, 1);
                } else {
                    showNotice(data.status, 0);
                }
            });
    }

    function createOpt(id, text) {
        elems.innerHTML += `
            <option value="${id}">${text}</option>
        `;

        const instances = M.FormSelect.init(elems);
    }

    function createUsersList(name, role) {
        userTable.innerHTML += `
            <tr>
                <td>${name}</td>
                <td>${role}</td>
            </tr>
        `
    }


    function addRole() {
        disableBtn(addRoleBtn);
        const isRole = rolesList.includes(roleName.value);

        if (roleName.value.trim() != '' && !isRole) {
            roleName.classList.remove('invalid');
            const data = roleName.value;
            createRole(data);
        } else {
            if (isRole) {
                showNotice('Role already exists.', 0);
                roleName.classList.add('invalid');
            }
            roleName.classList.add('invalid');
            enableBtn(addRoleBtn);
        }
    }

    function addUser() {
        disableBtn(addUserBtn);

        const selectRole = document.querySelector('.selected span').innerText;
        const options = Array.prototype.slice.call(document.querySelectorAll('option'));


        if (userName.value.trim() != '') {
            userName.classList.remove('invalid');
            const newUser = {
                'userName': userName.value,
                'userRole': getRoleId(selectRole, options)
            };

            createNewUser(newUser);

        } else {
            userName.classList.add('invalid');
            enableBtn(addUserBtn);
        }
    }

    function getRoleId(text, arr) {
        for (let item of arr) {
            if (item.text == text) {
                return parseInt(item.value);
            }
        }
    }

    function checkLocation(location) {
        if (location == '/') {
            getAllRoles();
            resetBtns();
            addUserBtn.addEventListener('click', addUser);
        } else if (location == '/role.html') {
            getAllRoles();
            resetBtns();
            addRoleBtn.addEventListener('click', addRole);
        } else if (location == '/users.html') {
            getUsers();
        }
    }
});



<template>
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Register Card -->
            <div class="card p-2">
                <div class="card-body mt-2">
                    <h4 class="mb-2">管理入口</h4>
                    <form id="formAuthentication" class="mb-3">
                        <div class="form-floating form-floating-outline mb-3">
                            <input
                                type="text"
                                class="form-control"
                                id="user_email"
                                name="user_email"
                                placeholder="請輸入email"
                                v-model="user_email"
                                autofocus />
                            <label for="user_email">Email</label>
                        </div>
                        <div class="mb-3">
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input
                                            type="password"
                                            id="user_pwd"
                                            class="form-control"
                                            name="user_pwd"
                                            v-model="user_pwd"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="user_pwd"
                                        />
                                        <label for="user_pwd">Password</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                                </div>
                            </div>
                        </div>
                        <p v-if="isShowMsg" class="text-bg-danger"> {{ returnMsg }} </p>
                        <div class="mb-3">
                            <button type='button' class="btn btn-primary d-grid w-100" @click="login">登入！</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
const user_email = defineModel('user_email')
const user_pwd = defineModel('user_pwd')
const isShowMsg = defineModel('isShowMsg', {default: false})
const returnMsg = defineModel('returnMsg')

async function login()
{
    const formData = new FormData();
    formData.append('email', user_email.value)
    formData.append('password', user_pwd.value);
    await axios.post(
        '/Gamerscon2024/admin/login',
        formData
    ).then( response => {
        window.location.href = '/Gamerscon2024/admin/news'
    }).catch( error => {
        let msgs = error.response.data;
        console.log(msgs);
        if( 'email' in msgs )
        {
            document.getElementById('user_email').classList.add('is-invalid')
            isShowMsg.value = true;
            returnMsg.value = 'Email格式不對';
        }
        else{
            isShowMsg.value = true;
            returnMsg.value = msgs.errors.accountError;
        }
    })

}

</script>

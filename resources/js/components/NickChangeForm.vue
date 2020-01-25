<template>
    <form>
        
        <div v-bind:class="classObject">
            <label for="exampleInputEmail1">新昵称</label>
            <input name="nick" type="text" class="form-control" placeholder="限制英文+数字组合" v-model="nickname">
            <span v-show="this.classObject['form-group has-error'] || this.classObject['form-group has-success']" id="helpBlock2" class="help-block">{{this.msg}}</span>
            <!--<p>csrf:{{ this.csrf }}</p>-->
        </div>
        <button :disabled="this.btn_stauts" v-on:click="submit" type="text" class="btn btn-primary pull-right">修改</button>

    </form>
</template>
<script>
    export default {
        props: ['action','csrf'],
            data() {
                return {
                    nickname: '',
                    btn_stauts:false,
                    classObject: {
                        'form-group': true,
                        'form-group has-error': false,
                        'form-group has-success': false,
                    },
                    msg:'',
                }
        },
        methods: {
            submit: function (e) {
                //停用提交按钮，防止用户重复提交
                this.btn_stauts = true

                fetch(this.action, {
                    method: 'POST', // or 'PUT'
                        headers: {
                            'X-CSRF-TOKEN': this.csrf,
                            'Content-Type': 'application/json',
                        },
                        body:JSON.stringify({
                            nick:this.nickname,
                        }),
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        //console.log('Success:', data);
                        if(data.state === "FAIL") {
                            this.classObject["form-group has-error"] = true
                            this.classObject["form-group"] = false
                            this.classObject["form-group has-success"] = false
                            this.msg = data.msg
                            this.btn_stauts = false
                        } else if(data.state === "OK") {
                            this.classObject["form-group has-error"] = false
                            this.classObject["form-group"] = false
                            this.classObject["form-group has-success"] = true
                            this.msg = data.msg
                            //刷新用户浏览器
                        
                            setTimeout(function(){location.reload()}, 3000);

                        }
                    })
                    .catch((error) => {
                        this.classObject["form-group has-error"] = true
                        this.classObject["form-group"] = false
                        this.classObject["form-group has-success"] = false
                        this.msg = "网络错误! 请重试"
                        this.btn_stauts = false
                    });


                e.preventDefault();
            }
        }

    }
</script>

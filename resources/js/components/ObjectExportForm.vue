<template>
    <div class="content">
        <div class="radio-inline">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                SA-MP 格式
            </label>
        </div>
        <div class="radio-inline">
        <label>
            <input type="radio" name="optionsRadios" value="option2">
            Streamer格式
            </label>
        </div>
        <div class="form-group">
            <label>绘制距离</label>
            <input type="number" class="form-control" v-model="drawDistance">
        </div>
        <div class="form-group">
            <textarea ref="code" class="form-control objexport" v-model="map"></textarea>
            <p class="text-right">总计:{{this.rawData.length}}条数据</p>
        </div>

        <button type="text" @click="selectAll" class="btn btn-primary pull-right">复制</button>
    </div>
</template>

<script>
    export default {
        props: ['action','csrf'],
        data: function () {
            return {
                rawData: [],
                map:"",
                drawDistance: 300,
            }
        },
       
        methods:{
            processMapFormat(rawData) {
                rawData.map((val) =>{
                    this.map += `CreateObject(${val['OID']}, ${val['X']}, ${val['Y']},${val['Z']},${val['RX']},${val['RY']}, ${val['RZ']}, ${this.drawDistance})\n`
                })
            },
            selectAll() {
                this.$refs.code.select()
            }

        },
        watch:{
            drawDistance: function(newVal) {
                //console.log(newVal)
                this.map = ""
                this.processMapFormat(this.rawData)
            }
        },
        mounted() {
            console.log('Component mounted.')

            fetch(this.action, {
                    method: 'GET', // or 'PUT'
                        headers: {
                            'X-CSRF-TOKEN': this.csrf,
                            'Content-Type': 'application/json',
                        },
                       
            })
            .then((response) => response.json())
            .then((data) => {
                if(data.state === "OK") {
                    console.log(data.data)
                    this.rawData = data.data
                    this.processMapFormat(data.data)
                } else {
                    alert(data.msg)
                }
            })
            .catch((error) => {
                 alert(error)
            }); 
        }
    }
</script>
<style scoped>
.objexport {
    width: 100%;
    height: 100vh;
    resize: none;
    font-family: 'consolas'
}
</style>

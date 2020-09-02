<template>
  <div class="row">
        <!--{{data['player']}}-->
        <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">状态</div>
           
                <table class="table">
                    <tr>
                        <td>状态</td>
                        <td><span class="label label-success">正常</span></td>
                    </tr>
                    <tr>
                        <td>名称</td>
                        <td>{{data["info"]["hostname"]}}</td>
                    </tr>
                    <tr>
                        <td>版本</td>
                        <td>{{data["info"]["gamemode"]}}</td>
                    </tr>
                    <tr>
                        <td>玩家</td>
                        <td>{{data["info"]["players"]}}/{{data["info"]["maxplayers"]}}</td>
                    </tr>
                </table>
      
          </div>
        
        </div>
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">在线玩家</div>
               
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>名称</th>
                            <th>分数</th>
                            <th>延迟</th>
                        </tr>
                        <tr v-for="item in data['player']" :key="item.playerid">
                            <td>{{item.playerid}}</td>
                            <td>{{item.nickname}}</td>
                            <td>{{item.score}}</td>
                            <td>{{item.ping}}</td>
                        </tr>
                        
                    </table>
          
              </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                data:{
                    "info":{
                        "hostname":null,
                        
                    }
                }
            }
        },
        methods: {
            fetchData:function() {
                axios.get("/api/serverinfo")
                .then(
                    res => {
                        this.data = res.data
                        console.log("OK")
                    }
                )
            }
        },
        mounted() {
            this.fetchData()
            //setInterval(this.fetchData,1000)
          
        }
    }
</script>

<style>
  
</style>
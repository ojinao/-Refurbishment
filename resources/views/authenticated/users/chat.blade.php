@extends('layouts.sidebar')

@section('content')
<div id="chat" style="margin-top:50px;">
  <textarea v-model="message"></textarea>
  <br>
  <button type="button" @click="send()" method="post">送信</button>
  <div v-for="m in messages">
    <!-- 登録された日時 -->
    <span v-text="m.created_at"></span>:&nbsp;
    <!-- メッセージ内容 -->
    <span v-text="m.body"></span>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script>
  new Vue({
    el: '#chat',
    data: {
      message: '',
      messages: []
    },

    methods: {
      send() {
        const url = 'ajax/chat';
        console.log(url);
        const params = {
          message: this.message
        };
        axios.post(url, params)
          .then((response) => {
            this.message = '';
          });
      },
      getMessages() {

        const url = '/ajax/chat';
        axios.get(url)
          .then((response) => {
            this.messages = response.data;
          });
      },
    },
    mounted() {
      this.getMessages();
      Echo.channel('chat')
        .listen('MessageCreated', (e) => {
          this.getMessages(); // 全メッセージを再読込
        });
    },
  });
</script>
@endsection
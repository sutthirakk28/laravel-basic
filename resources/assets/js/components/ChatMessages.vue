<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages">
            <div class="chat-body clearfix">   
                

                <p >
                    <span class="msg-block">
                        <img src="/images/img/demo/av1.jpg" alt="" />
                        <strong>{{ message.user.name }}</strong> 
                        <span class="time">ส่งแล้ว {{ message.created_at }} น.</span>
                        <span class="msg">{{ message.message }}</span>
                    </span>
                </p>

            </div>
        </li>
    </ul>  
</template>

<script>
export default {
  props: ['messages']
};
</script>


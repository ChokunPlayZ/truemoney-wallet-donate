# ระบบ Donate Truemoney Wallet

## ฟีเจอร์
- โดเนทผ่านลองค์ของขวัญ Truemoney Wallet
- ขึ้นจอ Streamlabs
- แจ้งเตือนผ่าน Line Notify

## การใช้งาน
1. โหลดไฟล์
2. แก้ไฟล์ config.php
3. สร้างโปรเจกใน Streamlabs [ตรงนี้](https://streamlabs.com/dashboard#/apps/register)
4. เจน token โดยใช้โปรเจกนี้ [Streamlabs Example NodeJS app](https://github.com/stream-labs/streamlabs-api-demo)
5. ใช้โปรแกรมอ่านไฟล์ sqlite เพื่ออ่านไฟล์ `db.sqlite` และก็ดึง token ออกมา
6. ใส่ refresh และ access token เข้าไปในไฟล์ config.php

7. สร้าง Line Notify Token ที่ [Line](https://notify-bot.line.me/en/)

9. ใส่ url ของเว็บไชต์ไปที่หน้าหลัก เช่น `https://tip.chokunplayz.com/` (ต้องมี "/" ต่อท้าย)
10. ใส่ token ทั้งหมด เข้าไปที่ไฟล์ `config.php`
    
11. เปลี่ยนเบอร์ wallet ที่ `config.php`

12. ทำเสร็จแล้ว ชอบ สามารถโดเนทให้ผมได้ที่ [tip.chokunplayz.com](https://tip.chokunplayz.com/)

ขอบคุณครับ

# 📊 Recruitment Management System – Database Schema

database name: rms_db

---

## 🗂️ departments

- **department_id**: INTEGER — Primary Key, Auto-increment  
- **name**: TEXT — Not Null  
- **description**: TEXT — Optional  

---

## 👤 recruiters

- **recruiter_id**: INTEGER — Primary Key, Auto-increment  
- **name**: TEXT — Not Null  
- **email**: TEXT — Unique, Not Null  

---

## 💼 job_positions

- **position_id**: INTEGER — Primary Key, Auto-increment  
- **title**: TEXT — Not Null  
- **description**: TEXT — Optional  
- **employment_type**: TEXT — Not Null, Check ('Full-time', 'Part-time', 'Contract')  
- **department_id**: INTEGER — Foreign Key → departments(department_id)  

---

## 📋 requisitions

- **requisition_id**: INTEGER — Primary Key, Auto-increment  
- **position_id**: INTEGER — Not Null, Foreign Key → job_positions(position_id)  
- **requested_by**: INTEGER — Not Null, Foreign Key → recruiters(recruiter_id)  
- **reason**: TEXT — Optional  
- **status**: TEXT — Default 'Pending', Check ('Pending', 'Approved', 'Rejected')  
- **date_requested**: DATE — Optional  
- **date_approved**: DATE — Optional  

---

## 📢 job_postings

- **posting_id**: INTEGER — Primary Key, Auto-increment  
- **requisition_id**: INTEGER — Not Null, Foreign Key → requisitions(requisition_id)  
- **posting_title**: TEXT — Not Null  
- **description**: TEXT — Optional  
- **post_date**: DATE — Optional  
- **close_date**: DATE — Optional  
- **channel**: TEXT — e.g. 'LinkedIn', 'Internal', 'Website'  
- **status**: TEXT — Default 'Draft', Check ('Draft', 'Published', 'Closed')  
- **sync_to_applicant_portal**: INTEGER — Default 1 (used as BOOLEAN)  

---

## 📈 job_posting_metrics

- **metric_id**: INTEGER — Primary Key, Auto-increment  
- **posting_id**: INTEGER — Not Null, Foreign Key → job_postings(posting_id)  
- **views**: INTEGER — Default 0  
- **applications**: INTEGER — Default 0  
- **shares**: INTEGER — Default 0  
- **last_updated**: TIMESTAMP — Default CURRENT_TIMESTAMP  

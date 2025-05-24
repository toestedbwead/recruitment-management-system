## Recruitment & Applicant Management System

A simple web-based system for managing recruitment applicants.

## Structure

- `public/` — Public files (index.php, CSS, JS)
- `src/` — PHP logic (database, functions)
- `config/` — Configuration files

# Recruitment System Modules

- **Job Position Management**
  - Define and manage job roles, job descriptions, employment types, and department associations.

- **Requisition Management**
  - Submit, review, and approve or reject hiring requests for new or replacement positions.

- **Job Posting Portal**
  - Create, edit, and publish job postings internally or externally.
  - Manage job posting schedules, statuses, and publishing channels.
  - View job posting analytics and performance metrics.
  - Sync job postings to the Application Management System.

- **Recruitment Dashboard**
  - Track open positions, time-to-fill, requisition status, and other KPIs.
  - Generate reports on recruitment efficiency.

- **Integration Interface**
  - API or messaging layer to push job postings to the Application Management System.

---

# Application Management System Modules

- **Application Portal**
  - Public or internal portal where applicants browse live job postings.
  - Submit applications with resumes, cover letters, and contact info.
  - View and track status of submitted applications.

- **Applicant Profile Management**
  - Manage detailed applicant profiles including contact info, resumes, and links.

- **Application Tracking**
  - Track each application’s progress through various stages (e.g., screening, interview, offer).

- **Interview Management**
  - Schedule interviews, record interviewer feedback, and assign ratings.
  - Manage interview stages and outcomes.

- **Application Analytics Dashboard**
  - Monitor candidate pipeline, application volumes, success rates, and stage drop-offs.
  - Reporting on applicant demographics and job-specific statistics.

- **Integration Interface**
  - API to receive job postings from Recruitment System.
  - API to send application status updates back to Recruitment System.

---

# Summary of User Roles and Portals

| System                  | Portal / Module        | Users                   | Purpose                                     |
|-------------------------|-----------------------|-------------------------|---------------------------------------------|
| Recruitment System      | Job Posting Portal     | Recruiters / Hiring Managers | Manage and publish job openings             |
| Application Management  | Application Portal     | Applicants / Candidates  | Browse jobs and submit applications         |

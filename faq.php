<!-- Page Header -->
<section class="content-header text-center">
    <div class="container-fluid">
        <div class="row mb-4 justify-content-center">
            <div class="col-md-8">
            <h1 style="font-weight: bold;" class="display-4">Frequently Asked Questions (FAQ)</h1>
            </div>
        </div>
    </div>
</section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">RBAC in AMS</h3>
                </div>
                <div class="card-body">
                    <div id="faq-accordion">
                        <!-- Question 1 -->
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        What is Role-Based Access Control (RBAC)?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faq-accordion">
                                <div class="card-body">
                                    RBAC is a system that assigns permissions to users based on their roles. In the context of aviation maintenance, roles such as Administrator, Manager, Technician, and Viewer have specific access rights to tasks and system features.
                                </div>
                            </div>
                        </div>

                        <!-- Question 2 -->
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        What roles are commonly used in this system?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faq-accordion">
                                <div class="card-body">
                                    Common roles include:
                                    <ul>
                                        <li><strong>Admin:</strong> Full access to manage users, tasks, and system settings.</li>
                                        <li><strong>Manager:</strong> Can assign projects, tasks, update and monitor progress, as well as view reports.</li>
                                        <li><strong>Crew:</strong> Responsible for performing and adding productivity on the assigned tasks.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Question 3 -->
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        How does RBAC improve aviation maintenance management?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faq-accordion">
                                <div class="card-body">
                                    RBAC ensures that users only access the data and features necessary for their roles, reducing errors and unauthorized changes. It also enhances security and task accountability.
                                </div>
                            </div>
                        </div>

                        <!-- Question 4 -->
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        How does role-based access control (RBAC) work in this system?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faq-accordion">
                                <div class="card-body">
                                RBAC ensures that each user can only access the features and data relevant to their role, 
                                improving security and workflow efficiency.
                                </div>
                            </div>
                        </div>

                        <!-- Question 5 -->
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    What should I do if I can't log in?                                </h5>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#faq-accordion">
                                <div class="card-body">
                                Ensure you’re using the correct username and password. If the problem persists, contact the admin or reset your password.                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center" style="background-color: #f9f9f9; border-top: 1px solid #ddd; padding: 15px;">
    <p style="margin: 0; font-size: 14px; color: #555;">
        Still have questions? Contact your system administrator at 
        <a href="mailto:elliyanisha02@gmail.com" style="color: #007bff; text-decoration: none;">
            elliyanisha02@gmail.com
        </a>.
    </p>
    <p style="margin: 0; font-size: 14px; color: #555;">
        Thank you for choosing <strong>AMS</strong>, and have a wonderful day! 😊
    </p>
</div>
        </div>
    </section>
</div>

<?php include 'footer.php'; ?>
@extends('layouts.master')

@section('title', 'Guides & Resources')

@section('additional-styles')
.main-content {
    background-color: #f8f9fa;
    padding: 24px;
    display: flex;
    gap: 20px;
}

.left-section {
    width: 70%;
    display: flex;
    flex-direction: column;
    gap: 20px;
    background-color: #f8f9fa;
    padding: 24px;
    border-radius: 16px;
}

.guide-card {
    width: 100%;
    max-width: 800px;
    background: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    padding: 32px;
    border-radius: 16px;
    border: none;
    margin: 0 auto;
}

.form-section {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.form-group label {
    font-weight: 600;
    color: #2d3436;
    font-size: 16px;
}

select {
    padding: 12px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    font-size: 16px;
    background-color: #f8f9fa;
    transition: all 0.3s ease;
}

select:hover {
    border-color: #4CAF50;
}

select:focus {
    outline: none;
    border-color: #4CAF50;
    box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.1);
}

.description {
    background: #f8f9fa;
    padding: 24px;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    margin-top: 20px;
}

.description h2 {
    color: #2d3436;
    font-size: 20px;
    margin-bottom: 16px;
    font-weight: 600;
}

.description p {
    color: #636e72;
    line-height: 1.6;
    margin-bottom: 16px;
}

.description a {
    color: #4CAF50;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.description a:hover {
    color: #45a049;
    text-decoration: underline;
}

.right-section {
    width: 25%;
    display: flex;
    flex-direction: column;
    gap: 20px;
    border-left: 1px solid #e0e0e0;
    padding-left: 24px;
    padding-right: 16px;
    margin-right: 16px;
    background-color: #f8f9fa;
    padding: 24px;
    border-radius: 16px;
}

.notification-box {
    width: 100%;
    height: 100%;
    background: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    padding: 24px;
    border-radius: 16px;
    overflow-y: auto;
    border: none;
}

.notification-box h3 {
    color: #2d3436;
    margin-bottom: 20px;
    font-size: 20px;
    text-align: left;
    padding-bottom: 16px;
    border-bottom: 2px solid #f1f3f5;
    font-weight: 700;
}

.notification-item {
    background: #f8f9fa;
    padding: 16px;
    margin-bottom: 16px;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    transition: all 0.3s ease;
}

.notification-item:hover {
    background: #f1f3f5;
}

.message-actions {
    display: flex;
    gap: 12px;
    margin-top: 12px;
}

.read-button, .delete-button {
    padding: 8px 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
}

.read-button {
    background-color: #4CAF50;
    color: white;
}

.read-button:hover {
    background-color: #45a049;
    transform: translateY(-2px);
}

.delete-button {
    background-color: #ff6b6b;
    color: white;
}

.delete-button:hover {
    background-color: #ff5252;
    transform: translateY(-2px);
}

.no-messages {
    text-align: center;
    color: #636e72;
    padding: 32px;
    font-style: italic;
    font-size: 15px;
}
@endsection

@section('content')
<div class="main-content">
    <!-- Left Section -->
    <div class="left-section">
        <div class="guide-card">
            <div class="form-section">
                <div class="form-group">
                    <label for="skillSelect">Select Skill:</label>
                    <select id="skillSelect" onchange="showSkillDetails()">
                        <option value="" disabled selected>Select a skill</option>
                        <option value="patientBathing">Patient Bathing</option>
                        <option value="vitalSigns">Vital Signs Check</option>
                        <option value="medicationAdmin">Medication Administration</option>
                        <option value="woundDressing">Wound Dressing</option>
                        <option value="patientEducation">Patient Education</option>
                        <option value="bedsideCare">Bedside Care</option>
                        <option value="emergencyResponse">Emergency Response</option>
                    </select>
                </div>

                <div id="skillDescription" class="description">
                    <h2>Select a skill to view the tutorial</h2>
                    <p>Once a skill is selected from the dropdown above, you will see the description and a link to the tutorial.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Section -->
    <div class="right-section">
        <div class="notification-box">
            <h3>Received Messages</h3>
            @if($messages->count() > 0)
                @foreach($messages as $message)
                    <div class="notification-item {{ !$message->is_read ? 'unread' : '' }}" 
                         data-message-id="{{ $message->id }}">
                        <div class="message-sender">
                            From: {{ $message->sender->name }}
                        </div>
                        <div class="message-content">
                            {{ Str::limit($message->content, 100) }}
                        </div>
                        <div class="message-time">
                            {{ $message->created_at->format('M d, Y H:i') }}
                        </div>
                        <div class="message-actions">
                            <button class="read-button" onclick="openMessageModal({{ $message->id }}, '{{ $message->content }}')">Read</button>
                            <button class="delete-button" onclick="confirmDelete({{ $message->id }})">Delete</button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="no-messages">
                    No messages received yet.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function showSkillDetails() {
        const skill = document.getElementById("skillSelect").value;
        const descriptionDiv = document.getElementById("skillDescription");
        
        const skills = {
            patientBathing: {
                description: "This skill covers the step-by-step process for assisting patients with bathing. Follow the tutorial for the best practices.",
                link: "patient_bathing_tutorial_link"
            },
            vitalSigns: {
                description: "Learn how to properly check a patient's vital signs, including blood pressure, heart rate, and temperature.",
                link: "vital_signs_tutorial_link"
            },
            medicationAdmin: {
                description: "Understand the process of administering medication, including dosage calculation and safety measures.",
                link: "medication_admin_tutorial_link"
            },
            woundDressing: {
                description: "Master the steps to properly dress and care for wounds, ensuring infection prevention and patient comfort.",
                link: "wound_dressing_tutorial_link"
            },
            patientEducation: {
                description: "Learn how to effectively educate patients about their health conditions and treatment plans.",
                link: "patient_education_tutorial_link"
            },
            bedsideCare: {
                description: "This tutorial helps you master bedside care techniques, focusing on patient comfort and safety.",
                link: "bedside_care_tutorial_link"
            },
            emergencyResponse: {
                description: "Review emergency response procedures, including CPR, first aid, and critical care interventions.",
                link: "emergency_response_tutorial_link"
            }
        };

        if (skills[skill]) {
            descriptionDiv.innerHTML = `
                <h2>${skills[skill].description}</h2>
                <p>For detailed instructions, please click on the tutorial link below:</p>
                <a href="${skills[skill].link}" target="_blank">Start the tutorial</a>
            `;
        } else {
            descriptionDiv.innerHTML = `
                <h2>Select a skill to view the tutorial</h2>
                <p>Once a skill is selected from the dropdown above, you will see the description and a link to the tutorial.</p>
            `;
        }
    }

    function openMessageModal(messageId, content) {
        // Implement message modal functionality
        alert(content); // For now, just show an alert
    }

    function confirmDelete(messageId) {
        if (confirm('Are you sure you want to delete this message?')) {
            fetch(`/message/${messageId}/delete`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const messageElement = document.querySelector(`[data-message-id="${messageId}"]`);
                    messageElement.remove();
                }
            });
        }
    }
</script>
@endsection

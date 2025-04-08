@extends('layouts.master')

@section('title', 'Practice Mode')

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

.practice-card {
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

.checkbox-group {
    display: flex;
    flex-direction: column;
    gap: 12px;
    background: #f8f9fa;
    padding: 16px;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
}

.checkbox-item {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.checkbox-item:hover {
    background: #f1f3f5;
}

.checkbox-item input[type="checkbox"] {
    width: 18px;
    height: 18px;
    border: 2px solid #4CAF50;
    border-radius: 4px;
    cursor: pointer;
}

.checkbox-item label {
    font-weight: 500;
    color: #2d3436;
    cursor: pointer;
}

.reset-btn {
    background-color: #ff6b6b;
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 16px;
    align-self: flex-start;
}

.reset-btn:hover {
    background-color: #ff5252;
    transform: translateY(-2px);
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
        <div class="practice-card">
            <div class="form-section">
                <div class="form-group">
                    <label for="subject">Select Subject:</label>
                    <select id="subject" name="subject" onchange="updateSkills()">
                        <option value="midwifery">Midwifery</option>
                        <option value="cardiovascular-technology">Cardiovascular Technology</option>
                        <option value="nursing">Nursing</option>
                        <option value="paramedic">Paramedic</option>
                        <option value="public-health">Public Health</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Select Skills:</label>
                    <div class="checkbox-group" id="skills">
                        <!-- Dynamic skill options will be injected here based on subject -->
                    </div>
                </div>

                <button class="reset-btn" onclick="resetSelections()">Reset Selections</button>
            </div>
        </div>
    </div>

    <!-- Right Section -->
    <div class="right-section">
        <div class="notification-box">
            <h3>Received Messages</h3>
            @if(isset($messages) && $messages->count() > 0)
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
    function updateSkills() {
        const subject = document.getElementById("subject").value;
        const skillsContainer = document.getElementById("skills");
        
        // Clear existing skills
        skillsContainer.innerHTML = '';

        const skills = getSkillsForSubject(subject);
        skills.forEach(skill => {
            const skillDiv = document.createElement('div');
            skillDiv.className = 'checkbox-item';
            skillDiv.innerHTML = `
                <input type="checkbox" id="${skill}" name="skills" value="${skill}">
                <label for="${skill}">${capitalizeFirstLetter(skill.replace(/-/g, ' '))}</label>
            `;
            skillsContainer.appendChild(skillDiv);
        });
    }

    function getSkillsForSubject(subject) {
        switch(subject) {
            case 'midwifery':
                return ['antenatal-care', 'delivery-assistance', 'postnatal-care', 'breastfeeding-support', 'maternal-monitoring', 'newborn-care', 'family-planning'];
            case 'cardiovascular-technology':
                return ['ecg-monitoring', 'echocardiography', 'stress-testing', 'cardiac-catheterization', 'cardiac-rehabilitation', 'blood-pressure-monitoring', 'vascular-ultrasound'];
            case 'nursing':
                return ['patient-bathing', 'vital-signs-check', 'medication-administration', 'wound-dressing', 'patient-education', 'bedside-care', 'emergency-response'];
            case 'paramedic':
                return ['patient-assessment', 'first-aid', 'trauma-care', 'patient-transport', 'airway-management', 'cardiac-arrest-management', 'medical-equipment-use'];
            case 'public-health':
                return ['epidemiology', 'health-survey-analysis', 'disease-prevention', 'community-health-promotion', 'environmental-health', 'vaccination-programs', 'health-policy-analysis'];
            default:
                return [];
        }
    }

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    function resetSelections() {
        const checkboxes = document.querySelectorAll('.checkbox-group input[type="checkbox"]');
        checkboxes.forEach(checkbox => checkbox.checked = false);
    }

    // Initialize skills on page load
    window.onload = updateSkills;
</script>
@endsection

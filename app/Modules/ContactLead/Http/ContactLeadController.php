<?php

namespace Modules\ContactLead\Http;

use App\Http\Controllers\Controller;
use Modules\ContactLead\Models\ContactLead;

class ContactLeadController extends Controller
{
    public function index()
    {
        $leads = ContactLead::latest()->paginate(20);

        return view('admin.contact-leads.index', compact('leads'));
    }

    public function destroy(ContactLead $contactLead)
    {
        $contactLead->delete();

        return back()->with('success', 'Lead deleted successfully.');
    }
}

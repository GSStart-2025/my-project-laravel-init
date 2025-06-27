import React, { useState, useEffect } from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { usePage } from "@inertiajs/react";
export default function Dashboard() {
    // Get initial comments from Inertia props
    const { props } = usePage();

    // Create state for comments
    const [comments, setComments] = useState(props.comments || []);

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Dashboard
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <table className="min-w-full bg-white border border-gray-200">
                                <thead>
                                    <tr className="bg-gray-100">
                                        <th className="py-3 px-4 border-b text-left">
                                            ID
                                        </th>
                                        <th className="py-3 px-4 border-b text-left">
                                            Content
                                        </th>
                                        <th className="py-3 px-4 border-b text-left">
                                            Post
                                        </th>
                                        <th className="py-3 px-4 border-b text-left">
                                            Author
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {comments.map((comment) => (
                                        <tr
                                            key={comment.id}
                                            className="hover:bg-gray-50"
                                        >
                                            <td className="py-3 px-4 border-b">
                                                {comment.id}
                                            </td>
                                            <td className="py-3 px-4 border-b">
                                                {comment.body}
                                            </td>
                                            <td className="py-3 px-4 border-b">
                                                {comment.post?.title || "N/A"}
                                            </td>
                                            <td className="py-3 px-4 border-b">
                                                {comment.user?.name ||
                                                    "Anonymous"}
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
